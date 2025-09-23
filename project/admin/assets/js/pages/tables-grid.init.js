/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: tables grid init Js File
*/

//basic tables
if (document.getElementById("basic_tables"))
    new gridjs.Grid({
        columns: ["Name", "Email", "Phone Number"],
        data: [
            ["John", "john@example.com", "(353) 01 222 3333"],
            ["Mark", "mark@gmail.com", "(01) 22 888 4444"],
            ["Eoin", "eoin@gmail.com", "0097 22 654 00033"],
            ["Sarah", "sarahcdd@gmail.com", "+322 876 1233"],
            ["Afshin", "afshin@mail.com", "(353) 22 87 8356"]
        ],
    }).render(document.getElementById("basic_tables"));

//pagination tables
if (document.getElementById("pagination_tables"))
    new gridjs.Grid({
        columns: ["Name", "Email", "Phone Number"],
        pagination: true,
        pagination: {
            limit: 3
        },
        data: [
            ["John", "john@example.com", "(353) 01 222 3333"],
            ["Mark", "mark@gmail.com", "(01) 22 888 4444"],
            ["Eoin", "eoin@gmail.com", "0097 22 654 00033"],
            ["Sarah", "sarahcdd@gmail.com", "+322 876 1233"],
            ["Sarah", "sarahcdd@gmail.com", "+322 876 1233"],
            ["Sarah", "sarahcdd@gmail.com", "+322 876 1233"],
            ["Sarah", "sarahcdd@gmail.com", "+322 876 1233"],
            ["Sarah", "sarahcdd@gmail.com", "+322 876 1233"],
            ["Sarah", "sarahcdd@gmail.com", "+322 876 1233"],
            ["Sarah", "sarahcdd@gmail.com", "+322 876 1233"],
            ["Sarah", "sarahcdd@gmail.com", "+322 876 1233"],
            ["Afshin", "afshin@mail.com", "(353) 22 87 8356"]
        ]
    }).render(document.getElementById("pagination_tables"));

//search tables
if (document.getElementById("search_tables"))
    new gridjs.Grid({
        columns: ["Name", "Email", "Phone Number"],
        search: true,
        data: [
            ["John", "john@example.com", "(353) 01 222 3333"],
            ["Mark", "mark@gmail.com", "(01) 22 888 4444"],
            ["Eoin", "eoin@gmail.com", "0097 22 654 00033"],
            ["Sarah", "sarahcdd@gmail.com", "+322 876 1233"],
            ["Sarah", "sarahcdd@gmail.com", "+322 876 1233"],
            ["Afshin", "afshin@mail.com", "(353) 22 87 8356"]
        ]
    }).render(document.getElementById("search_tables"));


// Sorting Table
if (document.getElementById("table_sorting"))
    new gridjs.Grid({
        columns: [{
            name: 'Name',
            width: '150px',
        }, {
            name: 'Email',
            width: '250px',
        }, {
            name: 'Position',
            width: '250px',
        }, {
            name: 'Company',
            width: '250px',
        }, {
            name: 'Country',
            width: '150px',
        }],
        pagination: {
            limit: 5
        },
        sort: true,
        data: [
            ["Jonathan", "jonathan@example.com", "Senior Implementation Architect", "Hauck Inc", "Holy See"],
            ["Harold", "harold@example.com", "Forward Creative Coordinator", "Metz Inc", "Iran"],
            ["Shannon", "shannon@example.com", "Legacy Functionality Associate", "Zemlak Group", "South Georgia"],
            ["Robert", "robert@example.com", "Product Accounts Technician", "Hoeger", "San Marino"],
            ["Noel", "noel@example.com", "Customer Data Director", "Howell - Rippin", "Germany"],
            ["Traci", "traci@example.com", "Corporate Identity Director", "Koelpin - Goldner", "Vanuatu"],
            ["Kerry", "kerry@example.com", "Lead Applications Associate", "Feeney, Langworth and Tremblay", "Niger"],
            ["Patsy", "patsy@example.com", "Dynamic Assurance Director", "Streich Group", "Niue"],
            ["Cathy", "cathy@example.com", "Customer Data Director", "Ebert, Schamberger and Johnston", "Mexico"],
            ["Tyrone", "tyrone@example.com", "Senior Response Liaison", "Raynor, Rolfson and Daugherty", "Qatar"],
        ]
    }).render(document.getElementById("table_sorting"));

//Resizable columns
if (document.getElementById("resizable_columns"))
    new gridjs.Grid({
        columns: ['Name', 'Email', 'Phone Number'],
        data: [
            ['John', 'john@example.com', '(353) 01 222 3333'],
            ['Mark', 'mark@gmail.com', '(01) 22 888 4444']
        ],
        sort: true,
        resizable: true,
    }).render(document.getElementById("resizable_columns"));


// Loading State Table
if (document.getElementById("table_loading_state"))
    new gridjs.Grid({
        columns: [{
            name: 'Name',
            width: '150px',
        }, {
            name: 'Email',
            width: '250px',
        }, {
            name: 'Position',
            width: '250px',
        }, {
            name: 'Company',
            width: '250px',
        }, {
            name: 'Country',
            width: '150px',
        }],
        pagination: {
            limit: 5
        },
        sort: true,
        data: function () {
            return new Promise(function (resolve) {
                setTimeout(function () {
                    resolve([
                        ["Jonathan", "jonathan@example.com", "Senior Implementation Architect", "Hauck Inc", "Holy See"],
                        ["Harold", "harold@example.com", "Forward Creative Coordinator", "Metz Inc", "Iran"],
                        ["Shannon", "shannon@example.com", "Legacy Functionality Associate", "Zemlak Group", "South Georgia"],
                        ["Robert", "robert@example.com", "Product Accounts Technician", "Hoeger", "San Marino"],
                        ["Noel", "noel@example.com", "Customer Data Director", "Howell - Rippin", "Germany"],
                        ["Traci", "traci@example.com", "Corporate Identity Director", "Koelpin - Goldner", "Vanuatu"],
                        ["Kerry", "kerry@example.com", "Lead Applications Associate", "Feeney, Langworth and Tremblay", "Niger"],
                        ["Patsy", "patsy@example.com", "Dynamic Assurance Director", "Streich Group", "Niue"],
                        ["Cathy", "cathy@example.com", "Customer Data Director", "Ebert, Schamberger and Johnston", "Mexico"],
                        ["Tyrone", "tyrone@example.com", "Senior Response Liaison", "Raynor, Rolfson and Daugherty", "Qatar"]
                    ])
                }, 2000);
            });
        }
    }).render(document.getElementById("table_loading_state"));

// Fixed Header
if (document.getElementById("table_fixed_header"))
    new gridjs.Grid({
        columns: [{
            name: 'Name',
            width: '150px',
        }, {
            name: 'Email',
            width: '250px',
        }, {
            name: 'Position',
            width: '250px',
        }, {
            name: 'Company',
            width: '250px',
        }, {
            name: 'Country',
            width: '150px',
        }],
        sort: true,
        pagination: true,
        fixedHeader: true,
        height: '400px',
        data: [
            ["Jonathan", "jonathan@example.com", "Senior Implementation Architect", "Hauck Inc", "Holy See"],
            ["Harold", "harold@example.com", "Forward Creative Coordinator", "Metz Inc", "Iran"],
            ["Shannon", "shannon@example.com", "Legacy Functionality Associate", "Zemlak Group", "South Georgia"],
            ["Robert", "robert@example.com", "Product Accounts Technician", "Hoeger", "San Marino"],
            ["Noel", "noel@example.com", "Customer Data Director", "Howell - Rippin", "Germany"],
            ["Traci", "traci@example.com", "Corporate Identity Director", "Koelpin - Goldner", "Vanuatu"],
            ["Kerry", "kerry@example.com", "Lead Applications Associate", "Feeney, Langworth and Tremblay", "Niger"],
            ["Patsy", "patsy@example.com", "Dynamic Assurance Director", "Streich Group", "Niue"],
            ["Cathy", "cathy@example.com", "Customer Data Director", "Ebert, Schamberger and Johnston", "Mexico"],
            ["Tyrone", "tyrone@example.com", "Senior Response Liaison", "Raynor, Rolfson and Daugherty", "Qatar"],
        ]
    }).render(document.getElementById("table_fixed_header"));

// Hidden Columns
if (document.getElementById("table_hidden_column"))
    new gridjs.Grid({
        columns: [{
            name: 'Name',
            width: '120px',
        }, {
            name: 'Email',
            width: '250px',
        }, {
            name: 'Position',
            width: '250px',
        }, {
            name: 'Company',
            width: '250px',
        },
        {
            name: 'Country',
            hidden: true
        },
        ],
        pagination: {
            limit: 5
        },
        sort: true,
        data: [
            ["Jonathan", "jonathan@example.com", "Senior Implementation Architect", "Hauck Inc", "Holy See"],
            ["Harold", "harold@example.com", "Forward Creative Coordinator", "Metz Inc", "Iran"],
            ["Shannon", "shannon@example.com", "Legacy Functionality Associate", "Zemlak Group", "South Georgia"],
            ["Robert", "robert@example.com", "Product Accounts Technician", "Hoeger", "San Marino"],
            ["Noel", "noel@example.com", "Customer Data Director", "Howell - Rippin", "Germany"],
            ["Traci", "traci@example.com", "Corporate Identity Director", "Koelpin - Goldner", "Vanuatu"],
            ["Kerry", "kerry@example.com", "Lead Applications Associate", "Feeney, Langworth and Tremblay", "Niger"],
            ["Patsy", "patsy@example.com", "Dynamic Assurance Director", "Streich Group", "Niue"],
            ["Cathy", "cathy@example.com", "Customer Data Director", "Ebert, Schamberger and Johnston", "Mexico"],
            ["Tyrone", "tyrone@example.com", "Senior Response Liaison", "Raynor, Rolfson and Daugherty", "Qatar"],
        ]
    }).render(document.getElementById("table_hidden_column"));

// Cell formatting
if (document.getElementById("cell_formatting"))
    new gridjs.Grid({
        columns: [
            'Salary 1',
            'Salary 2',
            {
                name: 'Sum',
                data: null,
                formatter: (_, row) => `$${(row.cells[0].data + row.cells[1].data).toLocaleString()} USD`
            },
        ],
        data: Array(5).fill().map(x => [
            Math.round(Math.random() * 100000),
            Math.round(Math.random() * 100000)
        ]),
    }).render(document.getElementById("cell_formatting"));