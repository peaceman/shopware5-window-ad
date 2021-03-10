Ext.define('Shopware.apps.n2305WindowAd.view.detail.WindowAd', {
    extend: 'Shopware.model.Container',
    padding: 20,

    configure: function() {
        return {
            controller: 'n2305WindowAd',
            fieldSets: [
                {
                    title: 'WindowAd data',
                    fields: {
                        title: {},
                        urlSlug: {},
                        productStreamId: {},
                        sliderItemMinWidth: {},
                    }
                },
            ],
        };
    }
});
