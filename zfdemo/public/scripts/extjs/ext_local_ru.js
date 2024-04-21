/* 
 * НИЯУ МИФИ, 2011
 */

// локализация фильтров
Ext.onReady(function(){
    // локализация
    if (Ext.ux.grid.GridFilters){
      Ext.apply(Ext.ux.grid.GridFilters.prototype, {
          menuFilterText: "Фильтры"
      });
    }

    // строковый
    if (Ext.ux.grid.filter.StringFilter){
      Ext.apply(Ext.ux.grid.filter.StringFilter.prototype, {
          emptyText: "Введите значение..."
      });
    }

    // логический
    if (Ext.ux.grid.filter.BooleanFilter) {
        Ext.apply(Ext.ux.grid.filter.BooleanFilter.prototype, {
            yesText : 'Да',
            noText : 'Нет'
        });
    }

    // дата
    if (Ext.ux.grid.filter.DateFilter) {
        Ext.apply(Ext.ux.grid.filter.DateFilter.prototype, {
            afterText : 'После',
            beforeText : 'До',
            onText : 'На дату'
        });
    }

    // Цифровой
    if (Ext.ux.grid.filter.NumericFilter) {
        Ext.apply(Ext.ux.grid.filter.NumericFilter.prototype, {
            menuItemCfgs : {
                emptyText: 'Введите значение...',
                selectOnFocus: true,
                width: 125
            }
        });
    }


});

