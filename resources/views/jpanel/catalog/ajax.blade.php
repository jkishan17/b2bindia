<script>
    $(function(){
        // DATA TABLE
        $("#categoryDataTable").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#categoryDataTable_wrapper .col-md-6:eq(0)');


        //STATUS SWITCH ON CHANGE EVENT
        $(".categoryStatus").on('change.bootstrapSwitch', function(e){
            let status = $(this).prop('checked') == true ? 1 : 0;
            let category_id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                type: "POST",
                dataType: "json",
                url: '{{route("status.change.category")}}',
                data: {'status': status, 'category_id': category_id},
                success: function(data){
                  if(data.status=="success"){
                    var selector=".flash-message .messageArea";
                    var message_status="success";
                    var message_data="Category status has been changed successfully!";
                    alertMessage(selector,message_status,message_data);
                  }
                }
            });
        })
        //DELETE Category
        $(".deleteCategory").on('click', function(e){
            e.preventDefault();
            let category_id = $(this).data('id');

            swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    type: "POST",
                    dataType: "json",
                    url: '{{route("category.delete")}}',
                    data: {'category_id': category_id},
                    success: function(data){

                        if(data.status=="success"){
                            var selector=".flash-message .messageArea";
                            var message_status="success";
                            var message_data="User has been deleted successfully!";
                            alertMessage(selector,message_status,message_data);

                            for (var i = 0; i < data.categories.length; i++) {
                                var category = data.categories[i];
                                $('.dataRow'+category.id).hide();
                            }
                            $('.dataRow'+category_id).hide();
                        }
                    }
                });
            }
          });
        })



        $("#brandDataTable").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#brandDataTable_wrapper .col-md-6:eq(0)');

        //STATUS SWITCH ON CHANGE EVENT
        $(".brandStatus").on('change.bootstrapSwitch', function(e){
            let status = $(this).prop('checked') == true ? 1 : 0;
            let brand_id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                type: "POST",
                dataType: "json",
                url: '{{route("status.change.brand")}}',
                data: {'status': status, 'brand_id': brand_id},
                success: function(data){
                  if(data.status=="success"){
                    var selector=".flash-message .messageArea";
                    var message_status="success";
                    var message_data="Brand status has been changed successfully!";
                    alertMessage(selector,message_status,message_data);
                  }
                }
            });
        })

        //DELETE Brand
        $(".deleteBrand").on('click', function(e){
            e.preventDefault();
            let brand_id = $(this).data('id');

            swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    type: "POST",
                    dataType: "json",
                    url: '{{route("brand.delete")}}',
                    data: {'brand_id': brand_id},
                    success: function(data){

                        if(data.status=="success"){
                            var selector=".flash-message .messageArea";
                            var message_status="success";
                            var message_data="Brand has been deleted successfully!";
                            alertMessage(selector,message_status,message_data);
                            $('.dataRow'+brand_id).hide();
                        }
                    }
                });
            }
          });
        })
    });
    </script>
