$(document).ready(function () {
    $('.customer-item').hover(function () {
        $(this).css('background-color', '#C0C0C0')
    }, function () {
        $(this).css('background-color', 'white')
    })

    let origin = location.origin

    function deleteCustomer(idCustomer) {
        console.log(1)
        $.ajax({
            url: origin + '/customers/' + idCustomer + '/delete',
            method: 'GET',
            success: function ($data) {
                console.log($data)
                $('#customer-'+idCustomer).remove();
            }
        })
    }

    $('.delete-customer').click(function () {
        // if (confirm("ban chac chan muon xoa")) {
            let id = $(this).attr('data-id');
            console.log(id)
            // deleteCustomer(id);
        // }
    })
    $("select[id='select-city']").change(function () {
        let city_id = $(this).val();
        console.log(city_id);
        console.log(origin);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: origin + '/customers/' + city_id + '/filterCity',
            method: 'POST',
            data: {},

            dataType: 'json',
            success: function (result) {
                console.log(this.url)
                console.log(result);

                let html = ''
                if (result.length !==0) {
                $.each(result, function (key, value) {

                        html += ' <tr>';
                        html += '<td scope="row">';
                        html += key;
                        html += '</td>';
                        html += '<td scope="row">';
                        html += `<img src="storage/${value.image}" width="50" height="50"> `;
                        html += '</td>';
                        html += '<td scope="row">';
                        html += value.name;
                        html += '</td>';
                        html += '<td scope="row">';
                        html += value.date;
                        html += '</td>';
                        html += '<td scope="row">';
                        html += value.email;
                        html += '</td>';
                        html += '<td scope="row">';
                        html += value.city_id;
                        html += '</td>';
                        html += '</tr>'

                })
                }else {
                    html = '<tr>\n' +
                        '                        <td>Không có dữ liệu khách hàng</td>\n' +
                        '                    </tr>'
                }

                $('#user-list').html(html)
            },

        })
    })
    $('#customer-name').on('keyup', function () { //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
        let query = $(this).val(); //lấy gía trị ng dùng gõ
        if (query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
        {
            let keyword = $('input[name="keyword"]').val(); // token để mã hóa dữ liệu
            $.ajax({
                url: origin + '/customers/index', // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                method: "GET", // phương thức gửi dữ liệu.
                data: {query: query, _token: keyword},
                success: function (data) { //dữ liệu nhận về
                    $('#customer-list').fadeIn();
                    $('#customer-list').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                }

            });


        }
    });

})
