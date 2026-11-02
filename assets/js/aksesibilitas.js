(function () {
    'use strict';

    var widget = document.getElementById('a11yWidget');
    var toggle = document.getElementById('a11yToggle');
    var panel  = document.getElementById('a11yPanel');
    var closeB = document.getElementById('a11yClose');
    if (!widget || !toggle || !panel || !closeB) { return; }

    var root = document.documentElement;
    var KEY = 'layak-anak-a11y-v1';

    var TOGGLE_KEYS = ['hc', 'dc', 'kb', 'anim'];
    var MIN_ZOOM = 80;
    var MAX_ZOOM = 150;
    var ZOOM_STEP = 10;

    var state = loadState();
    var zoom  = clampZoom(state.zoom || 100);

    var reading = false;
    var utterances = [];
    var readBtn = widget.querySelector('[data-a11y="read"]');
    var levelNodes = null;

    /* ------------------------- simpan / muat ------------------------- */
    function loadState() {
        try { return JSON.parse(localStorage.getItem(KEY)) || {}; }
        catch (e) { return {}; }
    }
    function saveState() {
        try { localStorage.setItem(KEY, JSON.stringify(state)); } catch (e) {}
    }

    /* ------------------------- ukuran teks --------------------------- */
    function clampZoom(v) {
        v = parseInt(v, 10);
        if (isNaN(v)) { return 100; }
        if (v < MIN_ZOOM) { return MIN_ZOOM; }
        if (v > MAX_ZOOM) { return MAX_ZOOM; }
        return v;
    }
    function setZoom(v) {
        zoom = clampZoom(v);
        state.zoom = zoom;
        if (zoom === 100) {
            root.style.removeProperty('zoom');
        } else {
            root.style.zoom = zoom + '%';
        }
        updateLevelBadges();
        saveState();
    }
    function updateLevelBadges() {
        if (!levelNodes) { levelNodes = widget.querySelectorAll('.a11y-level'); }
        for (var i = 0; i < levelNodes.length; i++) {
            levelNodes[i].textContent = zoom + '%';
        }
    }

    /* ------------------------- mode toggle --------------------------- */
    function syncButton(key) {
        var on = !!state[key];
        root.classList.toggle('a11y-' + key, on);
        var b = widget.querySelector('[data-a11y="' + key + '"]');
        if (b) { b.setAttribute('aria-pressed', on ? 'true' : 'false'); }
    }
    function applyAll() {
        TOGGLE_KEYS.forEach(syncButton);
        setZoom(zoom);
    }
    function toggleMode(key) {
        if (key === 'hc' && !state.hc) { state.dc = false; }
        if (key === 'dc' && !state.dc) { state.hc = false; }
        state[key] = !state[key];
        applyAll();
    }

    /* ------------------------- bacakan halaman ----------------------- */
    function isSupported() {
        return 'speechSynthesis' in window && 'SpeechSynthesisUtterance' in window;
    }
    function getReadableTexts() {
        var skip = [
            'header.main-header',
            'footer.main-footer',
            '.a11y-widget',
            '.a11y-skip-link',
            '.scroll-progress',
            '.back-to-top',
            'script',
            'style',
            'noscript',
            '[aria-hidden="true"]'
        ].join(', ');
        var sel = 'h1,h2,h3,h4,h5,h6,p,li,td,th,blockquote,figcaption,label,address';
        var nodes = document.querySelectorAll(sel);
        var out = [];
        for (var i = 0; i < nodes.length; i++) {
            var el = nodes[i];
            if (el.closest(skip)) { continue; }
            var txt = (el.textContent || '').replace(/\s+/g, ' ').trim();
            if (txt.length < 2) { continue; }
            out.push(txt);
        }
        return out;
    }
    function speak(index) {
        if (index >= utterances.length) {
            setReading(false);
            return;
        }
        var u = utterances[index];
        u.onend = function () { speak(index + 1); };
        u.onerror = function () { speak(index + 1); };
        try { window.speechSynthesis.speak(u); } catch (e) { setReading(false); }
    }
    function startReading() {
        var texts = getReadableTexts();
        if (!texts.length) { return; }
        utterances = texts.map(function (t) {
            var u = new SpeechSynthesisUtterance(t);
            u.lang = 'id-ID';
            u.rate = 1;
            u.pitch = 1;
            u.volume = 1;
            return u;
        });
        setReading(true);
        speak(0);
    }
    function stopReading() {
        try { window.speechSynthesis.cancel(); } catch (e) {}
        utterances = [];
        setReading(false);
    }
    function setReading(on) {
        reading = on;
        if (readBtn) {
            readBtn.setAttribute('aria-pressed', on ? 'true' : 'false');
            readBtn.classList.toggle('is-reading', on);
            var ic = readBtn.querySelector('i');
            if (ic) {
                ic.className = on ? 'fa-solid fa-stop' : 'fa-solid fa-volume-high';
            }
        }
    }
    function toggleReading() {
        if (!isSupported()) { return; }
        if (reading) { stopReading(); return; }
        stopReading();
        startReading();
    }

    /* ------------------------- reset -------------------------------- */
    function resetAll() {
        stopReading();
        window.scrollTo({ top: 0, behavior: 'auto' });
        TOGGLE_KEYS.forEach(function (k) { state[k] = false; });
        state.zoom = 100;
        applyAll();
        saveState();
        setPanel(false);
    }

    /* ------------------------- panel --------------------------------- */
    function setPanel(open) {
        panel.hidden = !open;
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        if (open) { toggle.focus(); }
    }

    /* ------------------------- skip link ----------------------------- */
    function ensureSkipLink() {
        if (document.querySelector('.a11y-skip-link')) { return; }
        var link = document.createElement('a');
        link.className = 'a11y-skip-link';
        link.href = '#konten-utama';
        link.textContent = 'Lewati ke konten utama';
        link.addEventListener('click', function (e) {
            e.preventDefault();
            var target = document.querySelector('#konten-utama') ||
                document.querySelector('.page-header, section[class], .main-header');
            if (target) {
                var ftarget = target;
                if (ftarget.className && String(ftarget.className).indexOf('page-header') !== -1) {
                    var h = ftarget.querySelector('h1');
                    if (h) { ftarget = h; }
                }
                if (!ftarget.getAttribute('tabindex')) { ftarget.setAttribute('tabindex', '-1'); }
                ftarget.focus();
                try { window.scrollTo({ top: ftarget.getBoundingClientRect().top + window.pageYOffset - 80, behavior: 'auto' }); } catch (e2) {}
            }
        });
        document.body.insertBefore(link, document.body.firstChild);
    }

    /* ------------------------- events -------------------------------- */
    if (toggle) {
        toggle.addEventListener('click', function () {
            setPanel(panel.hidden);
        });
    }
    if (closeB) {
        closeB.addEventListener('click', function () { setPanel(false); });
    }
    widget.addEventListener('click', function (e) {
        var btn = e.target.closest('[data-a11y]');
        if (!btn) { return; }
        var action = btn.getAttribute('data-a11y');
        if (action === 'read') { toggleReading(); }
        else if (action === 'text-inc') { setZoom(zoom + ZOOM_STEP); }
        else if (action === 'text-dec') { setZoom(zoom - ZOOM_STEP); }
        else if (action === 'reset') { resetAll(); }
        else { toggleMode(action); }
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && !panel.hidden) { setPanel(false); }
    });
    document.addEventListener('click', function (e) {
        if (!panel.hidden && !widget.contains(e.target)) { setPanel(false); }
    });

    /* ------------------------- init ---------------------------------- */
    ensureSkipLink();
    applyAll();
})();