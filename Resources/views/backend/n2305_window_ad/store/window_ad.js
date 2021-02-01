Ext.define('Shopware.apps.n2305WindowAd.store.WindowAd', {
    extend:'Shopware.store.Listing',

    configure: function() {
        return {
            controller: 'n2305WindowAd'
        };
    },
    model: 'Shopware.apps.n2305WindowAd.model.WindowAd'
});
