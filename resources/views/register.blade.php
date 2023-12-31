<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            MSME Register Form
        </title>
        <meta name="description" content="Login">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">

        <!-- ADDITIONAL CSS  -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- bootstrap -->

        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>
        <div class="page-wrapper">
            <div class="page-inner">

                <nav class="navbar topbar py-0">
                    <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="#">Govt. of Odisha</a>
                        </li>
                    </ul>
                    <ul class="nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i class="fa fa-envelope-o"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i class="fa fa-bell"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#"><i class="fa fa-user-circle-o"></i></a>
                        </li>
                    </ul>
                    </div>
                </nav>



                <nav class="navbar main-nav sticky-top navbar-light bg-white">
                    <div class="d-flex align-items-center container p-0">
                        <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center">
                            <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                                <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo" width="60">
                                <div class="mr-1 text-dark">
                                    <div class="page-logo-text">Micro, Small & Medium Enterprise Department</div>
                                    <div class="page-logo-text-small mr-1">Government of Odisha</div>
                                </div>                                    
                            </a>
                        </div>
                        <a href="page_register.html" class="btn btn-sm bg-clr-1 text-white ml-auto">Create Account</a>
                    </div>
                </nav>


                <div class="w-100 bg-register d-flex align-items-center position-relative">                    
                    <div class="bg-overlay"></div>
                    <div class="container">

                        <div class="w-100 bg-white position-relative rounded regFormBox my-5">

                            <h5 class="bg-gradient-1 text-white text-center py-2 mb-2">Registration Form</h5>

                            <form class="p-5">

                                <div class="mb-4 row">
                                    <div class="col-md-4">
                                        <h6>1. Type of Exporter</h6>
                                        <select class="form-select form-control form-control-sm" aria-label="Default select example">
                                            <option selected="">Form Types</option>
                                            <option value="merchant">Merchant</option>
                                            <option value="manufacturer">Manufacturer</option>
                                        </select>                              
                                    </div>
                                    <div class="col-md-4">
                                        <h6>2. Choose Category</h6>
                                        <select class="form-select form-control form-control-sm" aria-label="Default select example">
                                            <option selected="">Form Types</option>
                                            <option value="merchant">Merchant</option>
                                            <option value="manufacturer">Manufacturer</option>
                                        </select>                        
                                    </div>
                                    <div class="col-md-4">
                                        <h6>3. Name of Exporter</h6>
                                        <input type="text" class="form-control form-control-sm" placeholder="Exporter Name" name="" id="">                                        
                                    </div>
                                </div>

                                
            
                                <div class="mb-4">
                                    <h6>4.  Name of the chief executive</h6>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="CEO Name" name="" id="">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Mobile</label>
                                            <input type="tel" class="form-control form-control-sm" placeholder="Mobile " name="" id="">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">E-Mail</label>
                                            <input type="email" class="form-control form-control-sm" placeholder="E-Mail" name="" id="">
                                        </div>
                                    </div>
                                </div>
            
            
                                <div class="mb-4">                                    
                                    <h6>5.  Registered Office Address</h6>
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <label class="form-label">At </label>
                                            <input type="text" class="form-control form-control-sm" placeholder="At/Village/Building..." name="" id="">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Post</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="Post Office" name="" id="">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="City/Block" name="" id="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-label">District</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="District" name="" id="">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">PIN</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="PIN Code" name="" id="">
                                        </div>
                                        <div class="col-md-4">
                                            &nbsp;
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="mb-4">
                                    <h6>6.  Name Of the Banker</h6>
                                    <div class="row">
                                        <div class="col-md-4">                                    
                                            <input type="text" class="form-control form-control-sm" placeholder="Banker Name" name="" id="">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h6>7.  Bank Account Details </h6>
                                    <div class="row">
                                        <div class="col-md-4">                   
                                            <label class="form-label">Account No.</label>
                                            <input type="number" class="form-control form-control-sm" placeholder="Banker Name" name="" id="">
                                        </div>
                                        <div class="col-md-4">                   
                                            <label class="form-label">IFSC Code</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="Banker Name" name="" id="">
                                        </div>
                                        <div class="col-md-4">                   
                                            <label class="form-label">Consult Cheque</label>
                                            <input class="form-control form-control-sm" type="file">
                                        </div>
                                    </div>
                                </div>
            
                                <div class="mb-0">
                                    <div class="row">
                                        <div class="col-md-4 mb-4">                                    
                                            <h6>8. IEC (Import Export Code)</h6>
                                            <input type="text" class="form-control form-control-sm" placeholder="Name" name="" id="">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <h6>9. RCMC NO. & Nameof the EPC</h6>
                                            <input type="number" class="form-control form-control-sm" placeholder="Account No." name="" id="">                
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <h6>10. Udayam Registration  No.</h6>
                                            <input type="tel" class="form-control form-control-sm" placeholder="IFSC code" name="" id="">                
                                        </div>
                                    </div>
                                </div>
            
                                <div class="mb-4">
                                    <div class="row">
                                        <div class="col-md-4">                                    
                                            <h6>11. HSM Code</h6>
                                            <input type="text" class="form-control form-control-sm" placeholder="HSM Code" name="" id="">
                                        </div>
                                    </div>
                                </div>        
            
                                    <div class="row">
                                        <div class="col-md-10"></div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn bg-clr-1 text-white fw-bold w-100">Submit</button>
                                        </div>
                                    </div>
          
                            </form>
                        
                        </div>                        


                    </div><!-- container -->
                </div>
                
                
                <div class="footer-copy d-flex justify-content-center align-items-center text-white w-100 fw-300" style="font-size: 12px;background-color: black;">
                    2023 © OASYS by&nbsp;<a href='https://oasystspl.com/' class='text-white opacity-40 fw-500' title='Oasys' target='_blank'>https://oasystspl.com/</a>
                </div>


            </div>
        </div>
    </body>
</html>
