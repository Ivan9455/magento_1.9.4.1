let Callrequest = {
    save: function () {
        $j.ajax({
            type: "POST",
            url: "/codedrop_callrequest/index/save",
            data: $j('#call_request').serialize()
        }).done(function (result) {
            console.log(result)
        });
    },
    init: function () {
        $j('.call_request').click(function () {
            $j('.callrequest_form').removeClass('hidden');
        });
        $j('.close_callrequest').click(function () {
            $j('.callrequest_form').addClass('hidden');
        });
        $j('.callrequest_save').click(function () {
            Callrequest.save();
        });
    }
};
