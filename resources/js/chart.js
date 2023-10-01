import Chart from "chart.js/auto";

function show_Rtime (){
    const ctx = document.getElementById("Rtime");

    var date = [];
    var read_times =[];
    read_times_data.data.forEach((items) => date.push(items.created_at.split('T')[0]));
    read_times_data.data.forEach((items) => read_times.push(items.read_time));

    console.log(date);

    const Rtime = new Chart(ctx, {
        type: "line",
        data: {
            labels: date.reverse(),
            datasets: [
                {
                    label: "# 読書時間",
                    data: read_times.reverse(),
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                    ],
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                    ],
                },
            ],
        },
    });
}
function show_data () {
    const ctx_register = document.getElementById("info-register");

    console.log(books_data);
    
    var comics = books_data.comics;
    var novels = books_data.novels;
    
    var books_num = [comics,novels];
    
    const info_register_num = new Chart(ctx_register, {
        type: "pie",
        data: {
            labels: ['漫画','小説'],
            datasets: [
                {
                    label: "# 冊数",
                    data: books_num,
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(132, 99, 255, 0.2)",
                    ],
                    borderColor: [
                        "rgba(255, 255, 255, 1)",
                    ],
                },
            ],
        },
    });
    
    const ctx_total = document.getElementById("info-total");
    
    var total_comics = books_data.total_comics;
    var total_novels = books_data.total_novels;
    
    var books_total_num = [total_comics,total_novels];
    
    const info_total_num = new Chart(ctx_total, {
        type: "pie",
        data: {
            labels: ['漫画','小説'],
            datasets: [
                {
                    label: "# 冊数",
                    data: books_total_num,
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.2)",
                        "rgba(132, 99, 255, 0.2)",
                    ],
                    borderColor: [
                        "rgba(255, 255, 255, 1)",
                    ],
                },
            ],
        },
    });
}

if(document.getElementById("Rtime")){
    show_Rtime();
}

if(document.getElementById("info-register")){
    show_data();
}