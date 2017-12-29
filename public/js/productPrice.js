$(document).ready(function () {
    dynamicRow.init();
});

var dynamicRow = {
    root: $('#dynamic-rows-table'),
    data: {},
    row: $('.dynamic-row'),
    id: 0,
    number: 0,
    init: function () {
        this.data = JSON.parse($('#dynamic-data')[0].textContent);
        var used = false;

        this.row.attr('id', this.id);
        this.row.find($('select')).attr('name', "c" + this.id);
        this.row.find($('.smallPicker')).attr('name', "q" + this.id);
        this.id++;
        this.number++;
        $('#dynamic-number')[0].value = this.number;

        this.row.find($('i'))[0].onclick = function () {
            if (dynamicRow.number - 1 > 0) {
                $(dynamicRow.row[dynamicRow.row[0].id]).remove();
                dynamicRow.number--;
                $('#dynamic-number')[0].value = dynamicRow.number;
            }
        };

        this.row.find($('select').on({
            'change': function () {
                var selectedValue = dynamicRow.row.find($('select'))[0].value;

                if (selectedValue !== "" && used === false) {
                    dynamicRow.addRow();
                    used = true;
                }

                dynamicRow.calcTotalRowPrice(dynamicRow.row, selectedValue);
                dynamicRow.calcTotalPrice(dynamicRow.row);
            }
        }));

        this.row.find($('.smallPicker').on({
            'change': function () {
                var selectedValue = dynamicRow.row.find($('select'))[0].value;

                dynamicRow.calcTotalRowPrice(dynamicRow.row, selectedValue);
                dynamicRow.calcTotalPrice(dynamicRow.row)
            }
        }));
    },
    addRow: function () {
        var clone = this.row.first().clone();
        var used = false;

        clone.attr('id', this.id);

        this.root.append(clone);
        clone.find($('select')).attr('name', "c" + this.id);
        clone.find($('.smallPicker')).attr('name', "q" + this.id);
        this.id++;
        this.number++;
        $('#dynamic-number')[0].value = this.number;
        this.updateRow();

        clone.find($('.smallPicker'))[0].value = 1;
        clone.find($('.unitPrice'))[0].textContent = '--,--';
        clone.find($('.totalRowPrice'))[0].textContent = '--,--';

        clone.find($('i'))[0].onclick = function () {
            if (dynamicRow.number - 1 > 0) {
                $(dynamicRow.row[clone[0].id]).remove();
                dynamicRow.number--;
                $('#dynamic-number')[0].value(dynamicRow.number);
            }
        };

        clone.find($('select').on({
            'change': function () {
                var selectedValue = clone.find($('select'))[0].value;

                if (selectedValue !== "" && used === false) {
                    dynamicRow.addRow();
                    used = true;
                }

                dynamicRow.calcTotalRowPrice(clone, selectedValue);
                dynamicRow.calcTotalPrice(clone);
            }
        }));

        clone.find($('.smallPicker').on({
            'change': function () {
                var selectedValue = clone.find($('select'))[0].value;

                dynamicRow.calcTotalRowPrice(clone, selectedValue);
                dynamicRow.calcTotalPrice(clone)
            }
        }));
    },
    updateRow: function () {
        this.row = $('.dynamic-row');
    },
    calcTotalRowPrice: function (elem, selectedValue) {
        elem.find($('.unitPrice'))[0].textContent = dynamicRow.data[selectedValue - 1].price;
        elem.find($('.totalRowPrice'))[0].textContent = dynamicRow.data[selectedValue - 1].price;
    },
    calcTotalPrice: function (elem) {
        var totalPrice = 0;
        elem.find($('.totalRowPrice'))[0].textContent = parseFloat(elem.find($('.unitPrice'))[0].textContent) * elem.find($('.smallPicker'))[0].value;

        console.log($('.totalRowPrice').length);
        for (var i = 0; i < ($('.totalRowPrice').length - 1); i++) {
            var e = $('.totalRowPrice')[i];
            if (!isNaN(e.textContent)) {
                totalPrice += parseFloat(e.textContent);
            }
        }

        $('.totalPrice')[0].textContent = totalPrice;
    }
};