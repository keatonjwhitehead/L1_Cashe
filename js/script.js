$(document).ready(() => {
    navigator.geolocation.getCurrentPosition((position, err) => {

        // if browser does not support location, let user know
        if (err) {
<<<<<<< HEAD
            console.log("Please enable location services or go on a machine with GPS")
            console.log(err)
=======
            console.log("Please enable location services or go on a machine with GPS");
            console.log(err);
>>>>>>> 87f31964beff33be96d1108dc20b1b7093914abd
        }

        // find current position
        const pos = {
            "long": position.coords.longitude,
<<<<<<< HEAD
            "lat": position.coords.latitude				
        }

        // For treasure location filling
        $("input#treasure-locat_long").val(pos.long)
        $("input#treasure-locat_lat").val(pos.lat)				
        
=======
            "lat": position.coords.latitude
        };

        // For treasure location filling
        $("input#treasure-locat_long").val(pos.long);
        $("input#treasure-locat_lat").val(pos.lat);

>>>>>>> 87f31964beff33be96d1108dc20b1b7093914abd
        // for the verification
        $("div#solve-hints-treasure").append("Your Location: <br /> (" + pos.lat.toString() + ", " + pos.long.toString() + ")");
        $("div#solve-hints-treasure").click(() => {
            // use ajax so that you don't gotta refresh the page to verify
            $.ajax({
<<<<<<< HEAD
                url: "../verify.php",
                data: pos,
                type: "POST"
            }).done((result) => {
                console.log(result)
            }).fail((err) => {
                console.log(err)
            })
        })


    });
})
=======
                url: "/verify.php",
                data: pos,
                type: "POST"
            }).done((result) => {
                $('div#answerForm').html(result);
            }).fail((err) => {
                console.log(err);
            });
        });


    });
});
>>>>>>> 87f31964beff33be96d1108dc20b1b7093914abd
