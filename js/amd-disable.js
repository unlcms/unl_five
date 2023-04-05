define.origAmd = define.amd;
delete define.amd;

/**
 * Files that need to call WDN.initializePlugin() after this point can
 * use define.origAmd to restore define.amd before calling and then revert
 * in an "after" callback function. An example:
 *
 *   function initEventsBand() {
 *     define.amd = define.origAmd;
 *     delete define.origAmd;
 *
 *     var json = $("script[data-selector-json=wdn-events-band-settings]")['0'].innerHTML;
 *     var json = JSON.parse(json);
 *     WDN.setPluginParam('events', 'href', json.url);
 *     WDN.initializePlugin(
 *         'events-band',
 *         {limit: json.limit, rooms: true},
 *         enableAMDcallback,
 *         'after'
 *     );
 *
 *     function enableAMDcallback() {
 *       define.origAmd = define.amd;
 *       delete define.amd;
 *     }
 *   }
 */
