Ext.define('Shopware.apps.n2305WindowAd.view.list.Window', {
    extend: 'Shopware.window.Listing',
    alias: 'widget.window-ad-list-window',
    height: 450,
    title : '{s name=window_title}WindowAd listing{/s}',

    configure: function() {
        return {
            listingGrid: 'Shopware.apps.n2305WindowAd.view.list.WindowAd',
            listingStore: 'Shopware.apps.n2305WindowAd.store.WindowAd'
        };
    }
});
