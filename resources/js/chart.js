import Chart from "chart.js/auto";

if(document.getElementById("Rtime")){
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
}else if(document.getElementById("info-register")){
    const ctx = document.getElementById("info-register");

    console.log(books_data);
    
    var comics = books_data.comics;
    var novels = books_data.novels;
    
    var books_num = [comics,novels];
    
    const info_register_num = new Chart(ctx, {
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
    
    const ctx1 = document.getElementById("info-total");
    
    var total_comics = books_data.total_comics;
    var total_novels = books_data.total_novels;
    
    var books_total_num = [total_comics,total_novels];
    
    const info_total_num = new Chart(ctx1, {
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