<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <style>
    .bg-radient {
        background: rgb(45, 95, 148);
        background: linear-gradient(90deg, rgba(45, 95, 148, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);

    }
    </style>
    <script type="text/javascript">
    const base_url = '<?php echo base_url(); ?>';
    const site_url = '<?php echo site_url(); ?>';
    $(document).ready(function() {
        //Section 1 Answer
        var target_url = site_url + '/Energy/regen_energy';
        $('#update-energy').click(function() {
            var energy = $('#energy-field').val();
            var last_repelish = $('#last-timestamp').val();
            var repelish_time = $('#repelish-time').val();
            var data = {
                last_energy: energy,
                last_timestamp: last_repelish,
                energy_time: repelish_time
            };
            // return false;
            $.post(target_url, data)
                .done(function(data) {
                    $('#energy-field').val(data);
                });
        });
        // End of section 1

        //Section 2 Answer

        $('#timer').html('03:00');
        $('#info-alert').hide();
        startTimer();

        function startTimer() {
            var presentTime = $('#timer').text();
            var timeArray = presentTime.split(/[:]+/);
            var m = parseInt(timeArray[0]);
            var s = checkSecond((timeArray[1] - 1));
            if (s == 59) {
                m = m - 1
            }
            if (m < 0) {
                $('#info-alert').show();
                $('#timer').html('03:00');
            }

            $('#timer').html(m + ":" + s);
            setTimeout(startTimer, 1000);
        }

        function checkSecond(sec) {
            if (sec < 10 && sec >= 0) {
                sec = "0" + sec
            }; // add zero in front of numbers < 10
            if (sec < 0) {
                sec = "59"
            };
            return sec;
        }
        // End of section 2
    });
    </script>
</head>

<body>
    <nav class="navbar navbar-dark bg-radient">
        <span class=" navbar-brand mb-0 h1">Answer for algorithm test section A</span>
    </nav>


    <div class="form-group">
        <label for="exampleInputEmail1">Energy</label>
        <input type="number" class="form-control" id="energy-field" placeholder="Enter energy" value="20"
            name="last_energy">

    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Last Repelish</label>
        <input type="number" class="form-control" id="last-timestamp" placeholder="Enter energy" value="1358742774"
            name="last_timestamp">

    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Time to Repelish</label>
        <input type="number" class="form-control" id="repelish-time" placeholder="Enter energy" value="180"
            name="energy_time">

    </div>
    <button class="btn btn-primary" id="update-energy">Update Energy</button>

    <hr />
    <nav class="navbar navbar-dark bg-radient">
        <span class=" navbar-brand mb-0 h1">Answer for algorithm test section B</span>
    </nav>
    <div>Time left = <span id="timer"></span></div>
    <div class="alert alert-primary" role="alert" id="info-alert">
        countdown finished
    </div>

</body>

</html>