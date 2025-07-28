$(function () {
    /* Simple tree with colored icons  */

    $('#tree1').jstree({
        'core': {
            'data': [
                {
                'text': 'My pictures',
                "icon": "fa fa-picture-o c-red",
                'state': {
                    'selected': false
                }
            }, {
                'text': 'My videos',
                "icon": "fa fa-film c-orange",
                'state': {
                    'opened': true,
                    'selected': false
                },
                'children': [
                    {
                        'text': 'Video 1',
                        "icon": "fa fa-film c-orange"
                    },
                    {
                        'text': 'Video 2',
                        "icon": "fa fa-film c-orange",
                        'children': [
                            {
                                'text': 'Isbel',
                                "icon": "fa fa-film c-green"
                            }
                        ]

                    }]
            }, {
                'text': 'My documents',
                "icon": "fa fa-folder-o c-purple",
                'state': {
                    'selected': false
                },
                'children': [{
                    'text': 'Document 1',
                    "icon": "fa fa-folder-o c-purple",
                }, {
                    'text': 'Document 2',
                    "icon": "fa fa-folder-o c-purple",
                }]
            }, {
                'text': 'Events',
                "icon": "fa fa-calendar c-green",
                'state': {
                    'opened': false,
                    'selected': false
                }
            }, {
                'text': 'Messages',
                "icon": "fa fa-envelope-o",
                'state': {
                    'opened': false,
                    'selected': false
                }
            },]
        }
    });
});