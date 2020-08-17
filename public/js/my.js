$(document).ready(function () {
    $('.customer-item').hover(function () {
        $(this).css('background-color', '#C0C0C0')
    }, function () {
        $(this).css('background-color', 'white')
    })

    let origin = location.origin

    function deleteCustomer(idCustomer) {
        $.ajax({
            url: origin + '/customers/' + idCustomer + '/delete',
            method: 'GET',
            success: function ($data) {
                console.log($data)
                $('#customer-' + idCustomer).remove();
            }
        })
    }

    $('.delete-customer').click(function () {
        if (confirm("ban chac chan muon xoa")) {
            let id = $(this).attr('data-id');
            deleteCustomer(id);
        }
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


                     html += '</tr>'

                })

                $('#user-list').html(html)
            },

        })
    })
    $('#customer-name').on('keyup', function () { //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
        let query = $(this).val(); //lấy gía trị ng dùng gõ
        // console.log(query)
        $.ajax({
            url: origin + '/customers/search',
            method: "GET", // phương thức gửi dữ liệu.
            data: {query},
            success: function (result) { //dữ liệu nhận về
                console.log(result)

            }
        });
    });

})
