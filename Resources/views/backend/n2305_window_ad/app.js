Ext.define('Shopware.apps.n2305WindowAd', {
    extend: 'Enlight.app.SubApplication',

    name:'Shopware.apps.n2305WindowAd',

    loadPath: '{url action=load}',
    bulkLoad: true,

    controllers: [ 'Main' ],

    views: [
        'list.Window',
        'list.WindowAd',
        'detail.Window',
        'detail.WindowAd',
    ],

    models: [ 'WindowAd' ],
    stores: [ 'WindowAd' ],

    launch: function() {
        return this.getController('Main').mainWindow;
    }
});
