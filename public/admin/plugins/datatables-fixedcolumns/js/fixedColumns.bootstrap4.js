<<<<<<< HEAD
<<<<<<< HEAD
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
=======
=======
>>>>>>> 35f29d8582c49eb42195fda8eba57b86b44f6b50
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
>>>>>>> ccd27bba122804bd18b1d413011ab9f93dbdc3f6
=======
=======
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
>>>>>>> d6093f211b0e1c67bbe58ac856aca75b9b26bb26
>>>>>>> 35f29d8582c49eb42195fda8eba57b86b44f6b50
