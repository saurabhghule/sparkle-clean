function openRegionModal(selected_state_object){
    var state_code = ["IN-AP", "IN-GA", "IN-GJ", "IN-KA", "IN-KL", "IN-MP", "IN-MH", "IN-RJ", "IN-TN", "IN-WB"];
    var state_name = {
        "IN-AP": 'Andhra Pradesh',
        "IN-GA": 'Goa',
        "IN-GJ": 'Gujrat',
        "IN-KA": 'Karnataka',
        "IN-KL": 'Kerala',
        "IN-MP": 'Madhya Pradesh',
        "IN-MH": 'Maharashtra',
        "IN-RJ": 'Rajasthan',
        "IN-TN": 'Tamil Nadu',
        "IN-WB": 'West Bengal',
    };
    var selected_state_code=selected_state_object.state_code;
    if(selected_state_code == '' ){
        selected_state_code= state_code[selected_state_object.index]; 
    }

    if ($.inArray(selected_state_code, state_code) > -1) {
        $('#myModal-' + selected_state_code).modal({'size': 'lg'});
        $('#myModal-' + selected_state_code + ' .modal-title').text(state_name[selected_state_code]);
    }
} 

 $(document).on('ready', function () {
    if ($(".ourReach__page").is(":visible")) {
        $(function () {

            /*FOR INDIA MAP*/
            var india_map = $('#india-map').vectorMap({
                map: 'in_merc',
                backgroundColor: 'transparent',
                zoomOnScroll: false,
                markerStyle: {
                  initial: {
                    fill: '#FFFFFF',
                    stroke: '#efefef'
                  }
                },
                markers: [
                  {latLng: [17.385465, 78.460842], name: 'Hydrebad'},
                  {latLng: [15.490316, 73.826443], name: 'Panji'},
                  {latLng: [23.216277, 72.641950], name: 'Gandhinagar'},
                  {latLng: [12.964554, 77.608915], name: 'Bengaluru'},
                  {latLng: [8.521439, 76.937395], name: 'Thiruvananthapuram'},
                  {latLng: [23.262445, 77.398326], name: 'Bhopal'},
                  {latLng: [18.521309, 73.848535], name: 'Mumbai'},
                  {latLng: [26.913922, 75.787113], name: 'Jaipur'},
                  {latLng: [13.076840, 80.255652], name: 'Chennai'},
                  {latLng: [22.569000, 88.368538], name: 'Kolkata'},
                ],
                regionStyle: {
                    initial: {
                        fill: '#42a5f6',
                        "fill-opacity": 1,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 1
                    },
                },
                series: {
                    regions: [{
                        values: {
                            "IN-AP": '#42a5f6',
                            "IN-GA": '#42a5f6',
                            "IN-GJ": '#42a5f6',
                            "IN-KA": '#42a5f6',
                            "IN-KL": '#42a5f6',
                            "IN-MP": '#42a5f6',
                            "IN-MH": '#42a5f6',
                            "IN-RJ": '#42a5f6',
                            "IN-TN": '#42a5f6',
                            "IN-WB": '#42a5f6',
                            /*"IN-AN": 'transparent'*/
                        },
                        attribute: 'fill'
                    }],
                },
                onMarkerClick: function (event, code) {
                    var state_object={
                        state_code:'',
                        index:code
                    }
                    openRegionModal(state_object);
                },
                onRegionClick: function (event, code) {
                    var state_object={
                        state_code:code,
                        index:''
                    }
                    openRegionModal(state_object);
                },
            });
        });

        $("#IT").on('click',function(){
            $('#myModal-IT').modal({'size': 'lg'});
        });
        $("#AE").on('click',function(){
            $('#myModal-AE').modal({'size': 'lg'});
        });
        $("#MY").on('click',function(){
            $('#myModal-MY').modal({'size': 'lg'});
        });
        $("#SG").on('click',function(){
            $('#myModal-SG').modal({'size': 'lg'});
        });
        $("#PH").on('click',function(){
            $('#myModal-PH').modal({'size': 'lg'});
        });
    }
});