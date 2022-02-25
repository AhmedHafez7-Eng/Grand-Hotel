<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
/*! FixedColumns 4.0.1
 * 2019-2021 SpryMedia Ltd - datatables.net/license
 */
(function () {
    'use strict';

    /*! Bootstrap 4 integration for DataTables' FixedColumns
     * ©2016 SpryMedia Ltd - datatables.net/license
     */
    (function (factory) {
        if (typeof define === 'function' && define.amd) {
            // AMD
            define(['jquery', 'datatables.net-bs4', 'datatables.net-fixedcolumns'], function ($) {
                return factory($);
            });
        }
        else if (typeof exports === 'object') {
            // CommonJS
            module.exports = function (root, $) {
                if (!root) {
                    root = window;
                }
                if (!$ || !$.fn.dataTable) {
                    // eslint-disable-next-line @typescript-eslint/no-var-requires
                    $ = require('datatables.net-bs4')(root, $).$;
                }
                if (!$.fn.dataTable.SearchPanes) {
                    // eslint-disable-next-line @typescript-eslint/no-var-requires
                    require('datatables.net-fixedcolumns')(root, $);
                }
                return factory($);
            };
        }
        else {
            // Browser
            factory(jQuery);
        }
    }(function ($) {
        var dataTable = $.fn.dataTable;
        return dataTable.fixedColumns;
    }));

}());
=======
>>>>>>> d02408ee5e9325f38231c36ee8cca8b99fbc3d75
/*! Bootstrap 4 integration for DataTables' FixedColumns
 * ©2016 SpryMedia Ltd - datatables.net/license
 */
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['jquery', 'datatables.net-bs4', 'datatables.net-fixedcolumns'], function ($) {
            return factory($);
        });
    }
    else if (typeof exports === 'object') {
        // CommonJS
        module.exports = function (root, $) {
            if (!root) {
                root = window;
            }
            if (!$ || !$.fn.dataTable) {
                // eslint-disable-next-line @typescript-eslint/no-var-requires
                $ = require('datatables.net-bs4')(root, $).$;
            }
            if (!$.fn.dataTable.SearchPanes) {
                // eslint-disable-next-line @typescript-eslint/no-var-requires
                require('datatables.net-fixedcolumns')(root, $);
            }
            return factory($);
        };
    }
    else {
        // Browser
        factory(jQuery);
    }
}(function ($) {
    'use strict';
    var dataTable = $.fn.dataTable;
    return dataTable.fixedColumns;
}));
<<<<<<< HEAD
=======
=======
>>>>>>> a41f54054c9a731484a5dbe953e9751aaf1aa1c0
/*! FixedColumns 4.0.1
 * 2019-2021 SpryMedia Ltd - datatables.net/license
 */
(function () {
    'use strict';

    /*! Bootstrap 4 integration for DataTables' FixedColumns
     * ©2016 SpryMedia Ltd - datatables.net/license
     */
    (function (factory) {
        if (typeof define === 'function' && define.amd) {
            // AMD
            define(['jquery', 'datatables.net-bs4', 'datatables.net-fixedcolumns'], function ($) {
                return factory($);
            });
        }
        else if (typeof exports === 'object') {
            // CommonJS
            module.exports = function (root, $) {
                if (!root) {
                    root = window;
                }
                if (!$ || !$.fn.dataTable) {
                    // eslint-disable-next-line @typescript-eslint/no-var-requires
                    $ = require('datatables.net-bs4')(root, $).$;
                }
                if (!$.fn.dataTable.SearchPanes) {
                    // eslint-disable-next-line @typescript-eslint/no-var-requires
                    require('datatables.net-fixedcolumns')(root, $);
                }
                return factory($);
            };
        }
        else {
            // Browser
            factory(jQuery);
        }
    }(function ($) {
        var dataTable = $.fn.dataTable;
        return dataTable.fixedColumns;
    }));

}());
<<<<<<< HEAD
>>>>>>> 5870c1164dd2128d46c76312b15b6ffe83ebefa6
=======
>>>>>>> a41f54054c9a731484a5dbe953e9751aaf1aa1c0
=======
>>>>>>> d6093f211b0e1c67bbe58ac856aca75b9b26bb26
>>>>>>> d02408ee5e9325f38231c36ee8cca8b99fbc3d75
