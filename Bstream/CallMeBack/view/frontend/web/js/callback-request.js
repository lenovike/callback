define(
    [
        'jquery',
        'Magento_Ui/js/modal/modal',
        'jquery/ui'
    ],
    function(
        $,
        modal
    ) {
        return function (config) {
            var getRequestModalOptions = function () {
                var options = {
                    type: 'popup',
                    responsive: true,
                    innerScroll: false,
                    title: $.mage.__('Enter a phone number:'),
                    modalClass: 'call-back-modal request-modal',
                    closeText: $.mage.__('&times')
                };
                return options;
            };

            var getResponseModalOptions = function () {
                var options = {
                    type: 'popup',
                    responsive: true,
                    innerScroll: false,
                    closeText: '',
                    modalClass: 'call-back-modal response-modal',
                    buttons: [{
                        text: $.mage.__('Close'),
                        class: 'action primary'
                    }]
                };
                return options;
            };

            $("#create-callback-btn").on('click',function(e){
                e.preventDefault();
                if ($("#callback-form").valid()) {
                    showLoader();
                    $.ajax({
                        url: config.ajaxUrl,
                        type: 'POST',
                        data: {
                            phonenumber: $("#phone-number").val()
                        }
                    }).done(function (result) {
                        $("#callback-modal").modal("closeModal");
                        hideLoader();
                        $("#callback-response").html(
                            $.mage.__(result)
                        );
                        $("#callback-response-modal").modal("openModal");

                    }).fail(function () {
                        $("#callback-response").html(
                            $.mage.__(result)
                        );
                        $("#callback-response-modal").modal("openModal");
                    });
                }
            });

            var showLoader = function () {
                $("#callback-modal").prepend($("<div></div>", {"class": "callback-loader"}))
            };

            var hideLoader = function () {
                $("#callback-modal").find(".callback-loader").remove();
            };

            var responseModal = modal(getResponseModalOptions(), $('#callback-response-modal'));

            var popup = modal(getRequestModalOptions(), $('#callback-modal'));
            $("#click-callback").on('click',function(){
                $("#callback-modal").modal("openModal");
            });
            $("#header-callback-btn").on('click',function(){
                $("#callback-modal").modal("openModal");
            });
        }
    }
);

