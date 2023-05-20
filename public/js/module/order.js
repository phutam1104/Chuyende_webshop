    /*Quantity change*/
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
        var rowId = $button.parent().find('input').data('rowid');
        updateCart(rowId, newVal);
    });
;
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
      document.getElementById("search").style.width = "100%";
      document.getElementById("search").style.borderRadius = "0px";
      document.getElementById("order").style.backgroundColor = "white";


    }   
    else
    {
        document.getElementById("search").style.width = "75%";
        document.getElementById("search").style.borderRadius = "10px";
        document.getElementById("order").style.backgroundColor = "#f5f3ff";

    }
  }

    function addCart(productId) {
        $.ajax({
            type: "GET",
            url: "../../cart/add",
            data: {productId: productId},
            success: function (response) {
                $('.cart-count').text(response['count']);
                $('.cart-price').text('$' + response['total']);
                $('.select-total h5').text('$' + response['total']);

                var cartHover_tbody = $('.select-items table');
                var cartHover_existItem = cartHover_tbody.find("tr+" + "[data-rowId='" + response['cart'].rowId + "']");
                if (cartHover_existItem.length) {
                    cartHover_existItem.find('.product-selected p').text('$' + response['addCart'].price.toFixed(2) + 'x' + response['cart'].qty);
                } else {
                    var newItem =
                        '<tr data-rowId="' + response['cart'].rowId + '">\n' +
                        '  <td class="si-pic">\n' +
                        ' </td>\n' +
                        ' <td class="si-text">\n' +
                        '<div class="product-selected">\n' +
                        '               <p>$' + response['cart'].price.toFixed(2) + 'x' + response['cart'].qty + '</p>\n' +
                        '           <h6>' + response['cart'].name + '</h6>\n' +
                        '      </div>\n' +
                        '</td>\n' +
                        '<td>\n ' +
                        '   <i onclick="removeCart(\'' + response['cart'] + '\')">x</i>\n' +
                        '  </td>\n' +
                        '</tr>';
                    cartHover_tbody.append(newItem);
                }
                alert('Add sucessful!\nProduct:' + response['cart'].name);
                console.log(response);
            },
            error: function (response) {
                alert('Add failed!.');
                console.log(response);
            }
        })
    }

    function removeCart(rowId) {
        $.ajax({
            type: "GET",
            url: "cart/delete",
            data: {rowId: rowId},
            success: function (response) {
                //Xử lý phần cart hover
                $('.cart-count').text(response['count']);
                $('.cart-price').text('$' + response['total']);
                $('.select-total h5').text('$' + response['total']);

                var cartHover_tbody = $('.select-items table');
                var cartHover_existItem = cartHover_tbody.find("tr+" + "[data-rowId='" + rowId + "']");
                cartHover_existItem.remove();
                //Xử lý ở trong trang cart
                var cart_table = $('.cart-table table');
                var cart_existItem = cart_table.find("tr" + "[data-rowId='" + rowId + "']");
                cart_existItem.remove();

                alert('Delete sucessful!\nProduct:' + response['cart'].name);
                console.log(response);
            },
            error: function (response) {
                alert('Add failed!.');
                console.log(response);
            }
        })

    }

    function destroyCart() {
        $.ajax({
            type: "GET",
            url: "cart/destroy",
            data: {},
            success: function (response) {
                //Xử lý phần cart hover
                $('.cart-count').text('0');
                $('.cart-price').text('0');
                $('.select-total h5').text('0');

                var cartHover_table = $('.select-items table');
                cartHover_table.children().remove();
                //Xử lý ở trong trang cart
                var cart_table = $('.cart-table table');
                cart_table.children().remove();
                $('.subtotal span').text('0');
                $('.cart-total span').text('0');

                alert('Delete sucessful!\nProduct:' + response['cart'].name);
                console.log(response);
            },
            error: function (response) {
                alert('Add failed!.');
                console.log(response);
            }
        })
    }

    function updateCart(rowId, qty) {
        $.ajax({
            type: "GET",
            url: "cart/update",
            data: {rowId: rowId, qty: qty},
            success: function (response) {
                //Xử lý phần cart hover
                $('.cart-count').text(response['count']);
                $('.cart-price').text('$' + response['total']);
                $('.select-total h5').text('$' + response['total']);

                var cartHover_table = $('.select-items table');
                var cartHover_existItem = cartHover_table.find("tr+" + "[data-rowId='" + rowId + "']");
                if (qty === 0) {
                    cartHover_existItem.remove();
                } else {
                    cartHover_existItem.find('.product-selected p').text('$' + response['cart'].price.toFixed(2) + 'x' + response['cart'].qty);
                }
                //Xử lý ở trong trang cart
                var cart_table = $('.cart-table table');
                var cart_existItem = cart_table.find("tr+" + "[data-rowId='" + rowId + "']");
                if (qty === 0) {
                    cart_existItem.remove();
                } else {
                    cart_existItem.find('.total-price').text('$' + response['cart'].price.toFixed(2) + 'x' + response['cart'].qty);
                }

                $('.subtotal span').text('$' + response['subtotal']);
                $('.cart-total span').text('$' + response['total']);

                console.log(response);
            },
            error: function (response) {
                alert('Update failed!.');
                console.log(response);
            }
        })
    }

