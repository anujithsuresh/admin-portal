@extends('layouts.admin')

@section('content')

<h3>Search Customer by ID</h3>

<input type="number" id="customerIdInput" placeholder="Enter Customer ID" />
<button onclick="fetchCustomerData()" class="btn btn-primary btn-sm">Get</button>

<div id="customerResult"></div>

<script>
    function fetchCustomerData() {
        const customerId = document.getElementById('customerIdInput').value;

        if (!customerId) {
            alert('Please enter a Customer ID');
            return;
        }

        fetch(`http://127.0.0.1:8000/api/entity?id=${customerId}`)
        .then(res => res.json())
        .then(data => {
                // console.log(data);
                let html = '<h4>Customer Details:</h4>';
                if (data.customer) {
                    html += `<p><strong>Name:</strong> ${data.customer.name}</p>`;
                    html += `<p><strong>Email:</strong> ${data.customer.email}</p>`;
                    html += `<p><strong>Phone:</strong> ${data.customer.phone}</p>`;
                    html += `<p><strong>Address:</strong> ${data.customer.address}</p>`;
                } else {
                    html += `<p>No customer found with ID ${customerId}</p>`;
                    Admin
                }

                html += '<h4>Invoices:</h4>';
                if (data.invoices && data.invoices.length > 0) {
                    html += '<ul>';
                    data.invoices.forEach(inv => {
                        html += `<li>Invoice #${inv.id} | Amount: ${inv.amount} | Date: ${inv.date} | Status: ${inv.status}</li>`;
                    });
                    html += '</ul>';
                } else {
                    html += '<p>No invoices found.</p>';
                }

                document.getElementById('customerResult').innerHTML = html;
            })
            .catch(err => {
                console.error(err);
                document.getElementById('customerResult').innerText = 'Failed to fetch data.';
            });
    }
</script>

@endsection