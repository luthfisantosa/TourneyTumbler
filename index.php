<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>TOURNEYTUMBLER</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <!-- bracket-world -->
    <link rel="stylesheet" href="plugin/bracket-world/dist/assets/styles/jquery.bracket-world.css" />

    <!-- bracket library -->
    <script src="js/brackets.min.js"></script>
    <style type="text/css">
        body {
         background-image: url("assets/BG2.png");
        }

        td.kotak{
            border: 2px double Red;
            border-radius: 5px;
            background-color: #f0f0f0;
        }

        td.space{
            padding: 0px;
        }

        th, td {
            padding: 15px;
            border-radius: 5px;
        }

        .bg-color-1{
            background-color: #f2f2f2;
        }

        /* Style to draw line across the cell */
          .lt {
            position: relative;
          }

          .lt::after {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            border-bottom: 1px solid black;
            transform: translateY(-50%);
          }

        /* Customize overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        /* Customize modal */
        .modal-content {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            padding: 20px;
        }

        /* Back to top button */
        #backToTopBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            opacity: 0.5;
        }

        #backToTopBtn:hover {
            background-color: #0056b3;
        }

    </style>

</head>
<body>
    <div class="container mt-5">
        <h4 class="title">Welcome to TourneyTumbler</h4>
        <!-- <img src="assets/my-logo.png" class="float-end" width="10%" height="auto"> -->
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <span class="card-title"><h6>INPUT DATA</h6></span>
            </div>
            <div class="card-body">
                <form id="dynamicForm">
                    <div id="formContainer" class="m-2 p-2 form-group">
                        <div class="row">
                            <div class="form-group">
                                <button type="button" id="addField" class="btn btn-block btn-primary btn-sm float-end">+ Add Field</button>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="name[]" id="floatingInput" class="input form-control form-control-sm" placeholder="Name">
                                            <label for="floatingInput">Name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="section[]" id="floatingInput" class="input form-control form-control-sm" placeholder="Section">
                                            <label for="floatingInput">Section</label>
                                        </div>                        
                                    </div>
                                    <!-- <div class="col-sm-2">
                                        <button type="button" class="removeField btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button>
                                    </div> -->
                                </div>
                            </div>
                        </div>         
                    </div>
                </form>
                <div class="row">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button type="button" id="submitForm" class="btn btn-block btn-primary btn-sm float-end form-control">SUBMIT</button>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>

    <br>

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="container m-1">
                    <div class="row">
                        <div class="col-sm-3">
                            <button type="button" id="randomizeTable" class="btn btn-primary btn-block m-1 form-control"><span class="fa fa-dice"></span> Randomize DataTable</button>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" id="generateBracket" class="btn btn-success btn-block m-1 form-control">Generate Tournament Bracket</button>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" id="clearDataBtn" class="btn btn-danger btn-block m-1 form-control">Clear Table</button>
                        </div>
                        <div class="col-sm-3">
                            <button type="button" id="print" class="btn btn-primary btn-block m-1 form-control">Print</button>
                        </div>
                    </div>
                </div>
            </div>        
        </div>    
    </div>

    <br>

    <div class="container mt-5">
        <div class="card table-peserta">
            <div class="card-body">
                <div class="table-responsive m-5">
                    <table id="dataTable" class="display table-dashed">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Section</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <center>
                    <span id="bracket"></span>
                </center>
            </div>
        </div>
    </div> -->

    <div class="container mt-5 mb-5">
        <div class="card bagan-peserta bg-color-1">
            <div class="card-body">
                <center>
                    <div id="bracket1"></div>
                </center>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="card bagan-peserta">
            <div class="card-body">
                <div>
                    <h5>About TourneyTumbler</h5>
                    <hr>
                    <p>
                        TourneyTumbler is a dynamic application meticulously crafted by Luthfi Santosa. It serves as an essential tool for shuffling data and generating tournament brackets with unparalleled efficiency and accuracy.
                    </p>

                    <h2>Key Features:</h2>
                    <ol>
                        <li><strong>Data Shuffler:</strong> TourneyTumbler boasts an advanced data shuffling mechanism, enabling users to effortlessly randomize data for various tournament brackets. Whether you're organizing sports events, gaming tournaments, or any competitive activities, TourneyTumbler ensures fair and unbiased matchups every time.</li>
                        <li><strong>Bracket Generator:</strong> With TourneyTumbler, generating tournament brackets is a breeze. Featuring sophisticated algorithms and customizable options, users can swiftly create single-elimination, double-elimination, round-robin, or custom format brackets tailored to their specific requirements.</li>
                        <li><strong>Built with JavaScript, jQuery, and Bootstrap 5:</strong> TourneyTumbler is meticulously developed using industry-leading technologies like JavaScript, jQuery, and Bootstrap 5. This ensures optimal performance, responsiveness, and a seamless user experience across various devices and platforms.</li>
                        <li><strong>Powered by Bracket-World:</strong> TourneyTumbler harnesses the capabilities of Bracket-World, a robust JavaScript library for managing tournament brackets. This integration enhances the functionality and reliability of TourneyTumbler, making it the ultimate solution for tournament organizers and enthusiasts worldwide.</li>
                    </ol>

                    <h2>About the Developer:</h2>
                    <p>
                        TourneyTumbler is the brainchild of Luthfi Santosa, a dedicated software developer renowned for his innovative solutions. With expertise in JavaScript, jQuery, and Bootstrap, Luthfi has meticulously designed TourneyTumbler to cater to the diverse needs of tournament organizers, sports enthusiasts, and gaming communities globally.
                    </p>

                    <h2>Get Started with TourneyTumbler:</h2>
                    <p>
                        Embark on your journey with TourneyTumbler today! Whether you're orchestrating a local tournament or a global-scale event, TourneyTumbler empowers you to streamline the process and deliver an exceptional experience for participants and spectators alike.
                    </p>
                </div>
                <hr>
                <!-- Other footer content goes here -->
                <!-- Example QR code image -->
                <img src="assets/saweria.png" alt="QR Code" style="width: 100px; height: auto;">
                <h4 class="float-end">Created By <a href="#"></a>Luthfi Santosa</h4>
            </div>
        </div>
    </div>

    <!-- Back to top button -->
    <button id="backToTopBtn" onclick="scrollToTop()"><img src="assets/up.png" alt="QR Code" style="width: 50px; height: auto;"></button>

    <script>
    // Function to scroll to the top of the page
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: "smooth" // Smooth scrolling
        });
    }

    // Show or hide the back-to-top button based on scroll position
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        var backToTopBtn = document.getElementById("backToTopBtn");
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            backToTopBtn.style.display = "block";
        } else {
            backToTopBtn.style.display = "none";
        }
    }
    </script>

    <script>
        $(document).ready(function() {
            let fieldIndex = 0;
            var dataArray = [];
            var randomized_dataArray = [];

            $("#addField").on("click", function() {
                let newField = `
                        <div id="formContainer" class="m-2 p-2">
                            <div class="row">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="name[]" id="floatingInput" class="input form-control form-control-sm" placeholder="Name">
                                                <label for="floatingInput">Nama Peserta</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="section[]" id="floatingInput" class="input form-control form-control-sm" placeholder="Section">
                                                <label for="floatingInput">Section</label>
                                            </div>                        
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="removeField btn btn-block btn-danger btn-sm"><span class="fa fa-trash"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>         
                        </div>
                    `;
                    $("#formContainer").append(newField);
                    fieldIndex++;
            });

            $("#formContainer").on("click", ".removeField", function() {
                $(this).closest("#formContainer").remove();
                fieldIndex--;
            });

            $("#submitForm").on("click", function() {
                dataTable.clear().draw();
                $("#bracket").html("");
                $("#bracket1").html("");
                to_position('.table-peserta');
                let formData = $("#dynamicForm").serializeArray();

                // Convert the form data to a JavaScript array
                let entry = {};
                for (let i = 0; i < formData.length; i += 2) {
                    entry.name = formData[i].value;
                    entry.section = formData[i + 1].value;
                    dataArray.push(entry);
                    entry = {};
                }

                // Clear the form fields
                $("#dynamicForm")[0].reset();

                // Update DataTable with new data
                updateDataTable(dataArray);                
            });

            $("#randomizeTable").on("click", function() {
                // Randomize the DataTable
                dataArray.sort(() => Math.random() - 0.5);
                randomized_dataArray = dataArray.sort(() => Math.random() - 0.5);
                updateDataTable(dataArray);
            });

            $("#generateBracket").on("click", function() {
                to_position('.bagan-peserta');                
                var num = dataArray.length;
                console.log(num);
                $('#bracket1').bracket(
                {
                    teams:num,
                    topOffset:50,
                    height:'700px',
                    scale:0.75,
                    icons:true,
                    teamNames:dataArray
                });

                
                
            });

            // DataTable initialization
            let dataTable = $("#dataTable").DataTable({
                "ordering": false,
                "paging": false,
                "searching": false
            });

            // Function to update DataTable with new data
            function updateDataTable(dataArray) {
                // Clear existing rows
                dataTable.clear().draw();
                $("#bracket").html("");

                // Add new rows from the dataArray
                dataArray.forEach(entry => {
                    dataTable.row.add([entry.name, entry.section]).draw();
                });
            }

            //clear the datatables
            $('#clearDataBtn').on('click', function() {
                // Clear DataTable data
                dataArray = [];
                dataTable.clear().draw();
                $("#bracket").html("");
                $("#bracket1").html("");
            });
        });

        function to_position(divid){
             $('html, body').animate({scrollTop:$(divid).position().top - 50 }, 'fast');
         }

        $('#print').click(function(){
            // Get the HTML content of the bracket container
            var content = $('#bracket1').html();
            // Open a new window
            var printWindow = window.open('', '_blank');
            // Write the HTML content into the new window
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Bracket Tournament</title><style>@media print {body {visibility: hidden;} #bracket1, #bracket1 * {visibility: visible;}} </style></head><body>' + content + '</body></html>');
            printWindow.document.close();
            // Trigger the print dialog for the new window
            printWindow.print();
        });
    </script>

    <script src="plugin/bracket-world/dist/assets/scripts/jquery.bracket-world.min.js"></script>
</body>
</html>
