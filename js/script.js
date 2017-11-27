$(document).ready(() => {
    navigator.geolocation.getCurrentPosition((position, err) => {


        if (err) {
            console.log("Please enable location services or go on a machine with GPS")
            console.log(err)
        }


        const pos = {
            "long": position.coords.longitude,
            "lat": position.coords.latitude				
        }


        $("input#locat_long").val(pos.long)
        $("input#locat_lat").val(pos.lat)				
        
        
        $("div#solve-hints-treasure").append("Your Location: <br /> (" + pos.lat.toString() + ", " + pos.long.toString() + ")");
        $("div#solve-hints-treasure").click(() => {
            $.ajax({url: "../verify.php", data:pos, success: (result) => {
                console.log(result);
            }})
        })


    });
})