(function($) {
	$(document).ready(function(){
		/**
		 * LogOut
		 */
		$(document).on('click', 'a#logout-button', function(e){
            e.preventDefault();
            $('form#logout-form').submit();
        });

		//Department Image Load
        $(document).on('change', '#department_img', function (e){
            e.preventDefault();
            let file_url = URL.createObjectURL( e.target.files[0] );
            $('img#department_img_load').attr('src', file_url);
        });

		/**
         * Edit Department
         */
        $(document).on('click', 'a#department_edit', function(e){
            e.preventDefault();
			
            //Get ID
            let department_id = $(this).attr('department_id');

			

            $.ajax({
                url : 'department-edit/' + department_id,
                dataType : "json",
                success : function(data){
                    $('#update_department_modal input[name="id"]').val(data.id);
                    $('#update_department_modal input[name="department_id"]').val(data.department_id);
                    $('#update_department_modal input[name="old_name"]').val(data.name);
                    $('#update_department_modal input[name="old_photo"]').val(data.photo);
                    $('#update_department_modal img#department_Edit_img_load').attr('src', 'media/images/department/' + data.photo);
					$('#update_department_modal').modal('show');
                    //alert(data.id);
                }
            });
        });

		//Department Edit Image Load
        $(document).on('change', '#department_edit_img', function (e){
            e.preventDefault();
            let file_url = URL.createObjectURL( e.target.files[0] );
            $('img#department_Edit_img_load').attr('src', file_url);
        });


		/**
         * Add Doctor
         */
		$(document).on('click', '#appointment_btn', function (e){
			e.preventDefault();

			let rand = Math.floor(Math.random() * 10000);

			$('#appointment .apoint').append('<div id="doc_time_'+rand+'" class="row mt-2 mb-2">\n' +
			'<input name="app_code[]" value="'+rand+'" class="form-control" type="hidden">\n' +
			'<div class="col-md-5">\n' +            
			'    <select name="app_day[]" id="" class="form-control">\n' +
			'        <option value="0">-select a date-</option>\n' +
			'        <option value="everyday">Everyday</option>\n' +
			'        <option value="friday">Friday</option>\n' +
			'        <option value="saturday">Saturday</option>\n' +
			'        <option value="sunday">Sunday</option>\n' +
			'        <option value="monday">Monday</option>\n' +
			'        <option value="tuesday">Tuesday</option>\n' +
			'        <option value="wednesday">Wednesday</option>\n' +
			'        <option value="thursday">Thursday</option>\n' +
			'    </select>\n' +
			'</div>\n' +
			'<div class="col-md-3">\n' +
			'    <select name="app_start_time[]" id="" class="form-control">\n' +
			'        <option value="0">select a start time</option>\n' +
			'        <option value="10:00 AM">10:00 AM</option>\n' +
			'        <option value="11:00 AM">11:00 AM</option>\n' +
			'        <option value="12:00 PM">12:00 PM</option>\n' +
			'        <option value="1:00 PM">1:00 PM</option>\n' +
			'        <option value="2:00 PM">2:00 PM</option>\n' +
			'        <option value="3:00 PM">3:00 PM</option>\n' +
			'        <option value="4:00 PM">4:00 PM</option>\n' +
			'        <option value="5:00 PM">5:00 PM</option>\n' +
			'        <option value="6:00 PM">6:00 PM</option>\n' +
			'    </select>\n' +
			'</div>\n' +
			'<div class="col-md-1">\n' +
			'    <span style="text-align: center;">To</span>\n' +
			'</div>\n' +
			'<div class="col-md-3">\n' +
			'    <select name="app_end_time[]" id="" class="form-control">\n' +
			'        <option value="0">select a end time</option>\n' +
			'        <option value="12:00 PM">12:00 PM</option>\n' +
			'        <option value="1:00 PM">1:00 PM</option>\n' +
			'        <option value="2:00 PM">2:00 PM</option>\n' +
			'        <option value="3:00 PM">3:00 PM</option>\n' +
			'        <option value="4:00 PM">4:00 PM</option>\n' +
			'        <option value="5:00 PM">5:00 PM</option>\n' +
			'        <option value="6:00 PM">6:00 PM</option>\n' +
			'        <option value="7:00 PM">7:00 PM</option>\n' +
			'        <option value="8:00 PM">8:00 PM</option>\n' +
			'        <option value="9:00 PM">9:00 PM</option>\n' +
			'        <option value="10:00 PM">10:00 PM</option>\n' +
			'    </select>\n' +
			'</div>\n' +
			'</div>');
		});

		//Doctor Image Load 
        $(document).on('change', '#doctor_img', function (e){
            e.preventDefault();
            let file_url = URL.createObjectURL( e.target.files[0] );
            $('img#doctor_img_load').attr('src', file_url);
        });

		/**
         * Patient Appointment
         */
		// $(document).on('click', 'a#appoit_id', function (e){
        //     e.preventDefault();
        //     let doctor_id = $(this).attr('doctor_id');

		// 	$.ajax({
		// 		url : 'patient/' + doctor_id,
		// 		dataType : "json",
		// 		success : function(data){
		// 			// $('#add_appoint_doctor_modal form input[name="doctor_id"]').val(data.doctor_id);
		// 			// $('#add_appoint_doctor_modal form input[name="doctor_name"]').val(data.doctor_name);
		// 			// $('#add_appoint_doctor_modal form input[name="doctor_depart"]').val(data.doctor_depart);
		// 			// $('#add_appoint_doctor_modal form input[name="doctor_fee"]').val(data.doctor_fee);
		// 			alert(data);
		// 			$('#add_appoint_doctor_modal').modal('show');
		// 		}
		// 	});
        // });

		$(document).on('focus', '#test-box', function(e){
            e.preventDefault();
			$('ul#test-ul').fadeIn(1000);
		});

		$(document).on('blur', '#test-box', function(e){
            e.preventDefault();
			$('ul#test-ul').fadeOut(1000);
		});

		$(document).on('click', '#test-box #test-ul li', function(e){
            e.preventDefault();
			let vvv = $(this).text();
			$('#test-box #test-input').val(vvv);

			let test_fee = $(this).attr('test_fee');
			let fee_length = test_fee.length;

			$('#test-fee').val(test_fee);

			if(fee_length > 0){
				$("#test-fee").removeAttr('disabled');
			}else{
				$("#test-fee").attr('disabled', '');
			}
		});

		
		$(document).on('click', '#test_btn', function (e){
			e.preventDefault();

			let rand = Math.floor(Math.random() * 10000);

			$('#test_group').append('<div class="row">\n' +
			'<div class="col-md-6">\n' +
			'	<div id="test-box" class="test-box">\n' +
			'		<label for="">Test Name</label>\n' +
			'		<input name="test_name" class="form-control" id="test-input" type="text" placeholder="Select a test">\n' +
			'	</div>\n' +
			'</div>\n' +
			'<div class="col-md-6">\n' +
			'	<label for="">Test Fee</label>\n' +
			'	<input disabled name="test_fee" class="form-control" id="test-fee" type="text">\n' +
			'</div>\n' +
			'</div>');

			// let num = [10, 20];
			// for( var x=0; x<num.length; x++){
			// 	//console.log(x);
			// 	$('#test_group').append('Ok');
			// }

			//$('#test_group').append('Ok');
		});




	});
})(jQuery)