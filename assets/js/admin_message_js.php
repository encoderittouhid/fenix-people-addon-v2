<script>
jQuery('#send_message_by_admin_btn').on('click',function(e){
        e.preventDefault();
        let message=jQuery('#send_message_by_admin').val();
        if(!message)
        {
            return;
        }else
        {
            var formdata = new FormData();
            formdata.append('message',message);
            formdata.append('action','fenix_people_message_by_admin');
            formdata.append('receiver_id',<?=$user_id?>)
            formdata.append('nonce','<?php echo wp_create_nonce('fenix_people_message_by_admin') ?>')
        
      jQuery.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'post',
                    processData: false,
                    contentType: false,
                    processData: false,
                    data: formdata,
                    dataType: 'json',
                    success: function(data) {
                        if(data.success == "success")
                        {
                            let html=`
                            <div class="message_view admin">
                                <div class="view_inner">
                                    <p class="enc-aquamarine">${message}</p>
                                </div>
                            </div>
                            `;
                            jQuery('.message_div').append(html);
                            jQuery('#send_message_by_admin').val('')
                        }
                        

                    }
              });
            
        }
})


jQuery('#send_message_by_admin').on('keydown', function(e) {
    if (e.key === 'Enter' || e.keyCode === 13) { 
        e.preventDefault(); 
        jQuery('#send_message_by_admin_btn').click(); 
    }
});
</script>