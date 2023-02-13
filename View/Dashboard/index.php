<!doctype html>
<html lang="en">

<head>
  <title>Hello, world!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- Material Kit CSS -->
  <link href="View/Dashboard/assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />
<link href="View/Dashboard/assets/css/calendarorganizer.min.css" rel="stylesheet" />
  <link href="View/Dashboard/assets/css/custom.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

</head>

<body>
  <div class="page-header min-vh-80" style="background-image: url('https://images.unsplash.com/photo-1630752708689-02c8636b9141?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2490&q=80')">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
          <div class="text-center">
            <h1 class="text-white">Holiday planner</h1>
            <h3 class="text-white">Welcome <?php echo $_SESSION["name"];?></h3>
          </div>
    </div>
  </div>
  <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Overview</h2>
        <section class="pt-3 pb-4" id="count-stats">
            <div class="container">
                <div class="row">
                <div class="col-lg-9 mx-auto py-3">
                    <div class="row">
                    <div class="col-md-6 position-relative">
                        <div class="p-3 text-center">
                        <h1 class="text-gradient text-primary"><span id="state1" countTo="<?php echo $_SESSION["vacationHours"] -  $_SESSION["vacationHoursSpent"];?>"><?php echo $_SESSION["vacationHours"] -  $_SESSION["vacationHoursSpent"];?></span></h1>
                        <h5 class="mt-3">Vacation hours left</h5>
                        <p class="text-sm font-weight-normal">From buttons, to inputs, navbars, alerts or cards, you are covered</p>
                        </div>
                        <hr class="vertical dark">
                    </div>
                    <div class="col-md-6 position-relative">
                        <div class="p-3 text-center">
                        <h1 class="text-gradient text-primary"> <span id="state2" countTo="15"><?php echo  $_SESSION["vacationHoursSpent"];?></span></h1>
                        <h5 class="mt-3">Vacation hours spent</h5>
                        <p class="text-sm font-weight-normal">Mix the sections, change the colors and unleash your creativity</p>
                        </div>
                        <hr class="vertical dark">
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
            <h2 class="title">Request vacation</h2>
            <button type='button' data-bs-toggle='modal' class='btn bg-gradient-primary ModalBtn' data-bs-target='#exampleModal' id='ModalBtn'>Add event</button>
            <div class="calendarWrapper pt-3 pb-4">
                <button onClick="TodayBtnClicked(() => e)" id="todayBtn" class="calendarToday">today</button>
                <div id="calendarContainer"></div>
                <div id="organizerContainer"></div>
            </div>
            <div class="container py-7">
                <div class="row mt-3">
                    <div class="col-sm-4 col-6 mx-auto">
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                        <form method="POST">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pick your vacation days</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <input type="text" name="daterange" id="dataRangeInput" required />
                          <h5>Event name</h5>
                          <input type="text" name="vacationName" required />
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn bg-gradient-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                          </div>
                        </form>
                       </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Ends Here-->
        </div>
    </div>
  </div>

  <script src="View/Dashboard/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="View/Dashboard/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="View/Dashboard/assets/js/plugins/flatpickr.min.js"></script>
  <script src="View/Dashboard/assets/js/calendarorganizer.min.js"></script>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

  <script>
        /* Fill with whatever your dreams desire */
        // Basic config
            var calendar = new Calendar("calendarContainer", "small",
                                        [ "Monday", 3 ],
                                        [ "#e91e63", "#c2185b", "#fff", "#f8bbd0" ],
                                        {
                                            days: [ "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday",  "Saturday" ],
                                            months: [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
                                            indicator: true,         // Day Event Indicator                                                                    Optional
                                            indicator_type: 1,       // Day Event Indicator Type (0 not to display num of events, 1 to display num of events)  Optional
                                            indicator_pos: "bottom",
                                            placeholder: "<h2 class='title'>No events</h2>"
                                        });
                                        "use strict";
  const date = new Date();
  let day = date.getDate().toString().padStart(2, "0");
  let month = (date.getMonth() + 1).toString().padStart(2, "0");
  let year = date.getFullYear();
  $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                startDate: `${month}/${day}/${year}`,
                endDate: `${month}/${day}/${year}`,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'),10),
        });

function createData(dbData) {
  const checkIfKeyExist = (objectName, keyName) => {
    let keyExist = Object.keys(objectName).some(key => key === keyName);
    return keyExist;
  };

  var date = new Date();
  var data = {};
  for (var i = 0; i < dbData.length; i++) {
    var year = Object.keys(dbData[i]); 
    if (!checkIfKeyExist(data, year.toString())) {
      data[year.toString()] = {};
    }
    var monthArray = Object.values(dbData[i]);
    for (var j = 0; j < monthArray.length; j++) {
      var month = parseInt(Object.keys(monthArray[j]).toString());
        data[year.toString()][month] = {};
        var dayArray = Object.values(monthArray[j])[0];
      for (var k = 0; k < dayArray.length; k++) {
        var l = parseInt(Object.keys(dayArray[k]).toString());        
        data[year.toString()][month][l] = Object.values(dayArray[k]);   
      }
    }
  }

  return data;
}

          var userVacationData = JSON.parse('<?php echo json_encode($_SESSION["userVacationData"]) ?>');
          var data = createData(userVacationData);
          var organizer = new Organizer("organizerContainer", calendar, data);

  </script>
                       
</body>

</html>
