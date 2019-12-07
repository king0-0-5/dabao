define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'pack/index' + location.search,
                    add_url: 'pack_config/add',
                    edit_url: 'pack/edit',
                    del_url: 'pack/del',
                    multi_url: 'pack/multi',
                    table: 'pack',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'uid', title: __('Uid')},
                        {field: 'configid', title: __('Configid')},
                        {field: 'apk_status', title: __('Apk_status'), searchList: {"0":__('Apk_status 0'),"1":__('Apk_status 1'),"2":__('Apk_status 2')}, formatter: Table.api.formatter.status},
                        {field: 'ipa_url', title: __('Ipa_url'), formatter: Table.api.formatter.url},
                        {field: 'ipa_status', title: __('Ipa_status'), searchList: {"0":__('Ipa_status 0'),"1":__('Ipa_status 1'),"2":__('Ipa_status 2')}, formatter: Table.api.formatter.status},
                        {field: 'apk_url', title: __('Apk_url'), formatter: Table.api.formatter.url},
                        {field: 'created_at', title: __('Created_at')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});