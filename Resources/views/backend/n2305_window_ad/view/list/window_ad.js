Ext.define('Shopware.apps.n2305WindowAd.view.list.WindowAd', {
    extend: 'Shopware.grid.Panel',
    alias:  'widget.window-ad-listing-grid',
    region: 'center',
    configure: function() {
        return {
            detailWindow: 'Shopware.apps.n2305WindowAd.view.detail.Window',
        }
    }
});
