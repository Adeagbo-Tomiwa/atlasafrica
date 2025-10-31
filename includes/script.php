<script>
/* minimal tracking.js */
(function () {
  const TRACK_URL = '/api/track.php'; // POST endpoint

  const send = (payload) => {
    navigator.sendBeacon
      ? navigator.sendBeacon(TRACK_URL, JSON.stringify(payload))
      : fetch(TRACK_URL, { method: 'POST', body: JSON.stringify(payload), headers: { 'Content-Type': 'application/json' }});
  };

  // Page view
  send({
    type: 'page_view',
    path: location.pathname + location.search,
    title: document.title,
    referrer: document.referrer || null,
    user_agent: navigator.userAgent
  });

  // helper to send events
  window.atlasTrackEvent = function (type, data = {}) {
    send({ type: type, path: location.pathname, payload: data });
  };
})();
</script>
