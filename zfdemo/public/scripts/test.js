 var store = Ext.create('Ext.data.Store', {
     proxy: {
         type: 'ajax',
         url: '/index/get-data',
         reader: {
             type: 'json',
             rootProperty: 'users'
         }
     },
     autoLoad: true
 });

Ext.create('Ext.grid.Panel', {
    title: 'Simpsons',
    store: store,
    columns: [
        { text: 'Name', dataIndex: 'name' },
        { text: 'Email', dataIndex: 'email', flex: 1 },
        { text: 'Phone', dataIndex: 'phone' }
    ],
    height: 200,
    width: 400,
    renderTo: 'grid-panel'
});