<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TASKAPP - LOGIN</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link href="/css/style.css" rel="stylesheet">

    <link href="/css/jquery-ui-1.10.2.custom.css" rel="stylesheet">

</head>

<body class=" top-navigation">


<div id="wrapper">

    <div id="page-wrapper" class="awo-bg">

        <div class="row">

            <div class="col-lg-2">
                <div class="text-left ">
                    <h2 class="text-uppercase">
                        TASKAPP V 1.0
                    </h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="text-left pt-4 pb-2">

                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-right pt-4 pb-2 flex-row">

                </div>
            </div>

            <div class="col-lg-12">

                <div class="ibox mb-1">
                    <div class="ibox-title">
                        <h5>Login Page</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="fullscreen-link">
                                <i class="fa fa-expand"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content f-14">


                        <?php include 'TaskApp/Views/'.$content.'.php'; ?>

                    </div>
                </div>

            </div>

        </div>

    </div>




    <!-- Mainly scripts -->
    <script src="/js/jquery-2.1.1.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js"></script>


    <script src="/js/jquery-ui-1.10.2.custom.min.js"></script>


</body>

</html>
