<?php if ($user['rank'] != 0  && $user['rank'] != 5 && $user['rank'] != 4 && $user['rank'] != 100) exit; ?>
<div class="flex column height-full width-full">
    <div class="wrapper-page flex row">
        <div class="flex column height-full width-full p-2">
            <div class="flex justify-start">
                <a href="<?php echo $site['root']; ?>withdraw"><button class="site-button black"><i class="fa fa-arrow-left mr-1"></i> Back to Options</button></a>
            </div>

            <div class="flex justify-center mt-4 overflow-a">
                <div class="bg-light-transparent rounded-1 b-d2 p-4 width-8 responsive currency-panel">
                    <div class="title-page flex items-center justify-center mb-1">Withdraw Diamond Locks</div>

                    <div class="flex row justify-center gap-1 mb-4">
                        <button class="site-button black switch_panel" data-id="grow" data-panel="manually">Manually</button>
                    </div>

                    <div data-panel="manually">
                        <div class="width-8 responsive m-a">
                            <div class="input_field bet_input_field transition-5" data-border="#de4c41">
                                <div class="field_container">
                                    <div class="field_content">
                                        <input type="text" class="field_element_input" id="withdraw_world" value="">

                                        <div class="field_label transition active">World name</div>
                                    </div>

                                    <div class="field_extra"></div>
                                </div>

                                <div class="field_bottom my-2">
                                    <div class="field_error" data-error="required">This field is required</div>
                                </div>
                            </div>
                        </div>

                        <div class="width-8 responsive m-a">
                            <div class="input_field bet_input_field transition-5" data-border="#de4c41">
                                <div class="field_container">
                                    <div class="field_content">
                                        <input type="text" class="field_element_input" id="withdraw_growid" value="">

                                        <div class="field_label transition active">GrowId</div>
                                    </div>

                                    <div class="field_extra"></div>
                                </div>

                                <div class="field_bottom my-2">
                                    <div class="field_error" data-error="required">This field is required</div>
                                </div>
                            </div>
                        </div>

                        <div class="width-8 responsive m-a">
                            <div class="input_field bet_input_field transition-5" data-border="#de4c41">
                                <div class="field_container">
                                    <div class="field_content">
                                        <input type="text" class="field_element_input" id="withdraw_amount" value="">

                                        <div class="field_label transition active">Amount</div>
                                    </div>

                                    <div class="field_extra"></div>
                                </div>

                                <div class="field_bottom">
                                    <div class="field_error" data-error="required">This field is required</div>
                                    <div class="field_error" data-error="number">This field must be a number</div>
                                    <div class="field_error" data-error="greater">You must enter a greater value</div>
                                </div>
                            </div>
                        </div>

                        <div class="width-8 m-a grid split-column-full responsive gap-1 mt-2">
                            <button class="site-button black dl_withdraw_method" data-method="dbox">Donation Box</button>
                        </div>

                        <div class="text-danger"> Make sure you have a Donation Box that is reachable, otherwise process will be canceled </div>

                        <div class="mt-4">
                            <button class="site-button purple dl_withdraw_manually" id="withdrawbtn">WITHDRAW</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script>
    $(function() {
        $('#withdrawbtn').click(function() {
            const world = document.getElementById("withdraw_world").value
            const growid = document.getElementById("withdraw_growid").value
            const amount = document.getElementById("withdraw_amount").value
            const via = $("button.site-button.dl_withdraw_method.active").text()
            $.ajax({
                type: "POST",
                url: "/withdraw_grow_process.php",
                data: JSON.stringify({
                    "world": world,
                    "growID": growid,
                    "amount": amount,
                    "via": via
                }),
                dataType: "json",
                crossDomain: "true",
                contentType: "application/json",

                success: function(response) {
                    console.log("success");
                },
                error: function(error) {
                    console.log("error");
                }
            });
        });
    });
</script>