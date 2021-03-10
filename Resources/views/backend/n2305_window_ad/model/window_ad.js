Ext.define('Shopware.apps.n2305WindowAd.model.WindowAd', {
    extend: 'Shopware.data.Model',

    configure: function() {
        return {
            controller: 'n2305WindowAd',
            detail: 'Shopware.apps.n2305WindowAd.view.detail.WindowAd'
        };
    },

    fields: [
        { name : 'id', type: 'int', useNull: true },
        { name : 'title', type: 'string' },
        { name : 'urlSlug', type: 'string' },
        { name: 'productStreamId', type: 'int', },
        { name: 'sliderItemMinWidth', type: 'int', },
        { name : 'createdAt', type: 'datetime' },
    ],

    associations: [
        {
            relation: 'ManyToOne',
            field: 'productStreamId',
            type: 'hasMany',
            model: 'Shopware.apps.ProductStream.model.Stream',
            name: 'getProductStream',
            associationKey: 'productStream',
        }
    ],
});
