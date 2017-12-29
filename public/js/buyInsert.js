$(document).ready(function () {
    dynamicRow.init();
});

var dynamicRow = {
    root: $('#dynamic-rows-table'),
    row: $('.dynamic-row'),
    id: 0,
    number: 0,
    init: function () {
        var used = false;

        this.row.attr('id', this.id);
        this.id++;
        this.number++;

        this.row.find($('i'))[0].onclick = function () {
            if (dynamicRow.number - 1 > 0) {
                $(dynamicRow.row[dynamicRow.row[0].id]).remove();
                dynamicRow.number--;
            }
        };

        this.row.find($('select').on({
            'change': function () {
                var selectedValue = dynamicRow.row.find($('select'))[0].value;

                if (selectedValue !== "" && used === false) {
                    dynamicRow.addRow();
                    used = true;
                }
            }
        }));
    },
addRow: function () {
        var clone = this.row.first().clone();
        var used = false;
clone.attr('id', this.id);

        this.id++;
        this.number++;
        this.root.append(clone);
        this.updateRow();

        clone.find($('i'))[0].onclick = function () {
            if (dynamicRow.number - 1 > 0) {
                $(dynamicRow.row[clone[0].id]).remove();
                dynamicRow.number--;
            }
        };

        clone.find($('select').on({
            'change': function () {
                var selectedValue = clone.find($('select'))[0].value;

                if (selectedValue !== "" && used === false) {
                    dynamicRow.addRow();
                    used = true;
                }
            }
        }));
    },
    updateRow: function () {
        this.row = $('.dynamic-row');
    },
};
