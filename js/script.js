$(document).ready(() => {
    navigator.geolocation.getCurrentPosition((position, err) => {

        // if browser does not support location, let user know
        if (err) {
            console.log("Please enable location services or go on a machine with GPS");
            console.log(err);
        }

        // find current position
        const pos = {
            "long": position.coords.longitude,
            "lat": position.coords.latitude
        };

        // For treasure location filling
        $("input#treasure-locat_long").val(pos.long);
        $("input#treasure-locat_lat").val(pos.lat);

        // for the verification
        $("div#solve-hints-treasure").append("Your Location: <br /> (" + pos.lat.toString() + ", " + pos.long.toString() + ")");
        $("div#solve-hints-treasure").click(() => {
            // use ajax so that you don't gotta refresh the page to verify
            $.ajax({
                url: "/verify.php",
                data: pos,
                type: "POST"
            }).done((result) => {
                $('div#answerForm').html(result);
                // console.log(result);
            }).fail((err) => {
                console.log(err);
            });
        });


    });
});
