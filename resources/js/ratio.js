function ratio(num) {
    switch (num) {
        case 1:
            var comics = books_data.comics;
            var novels = books_data.novels;
            if(comics == 0){
                return "漫画を登録してください";
            }else{
                var comics_ratio = (comics / (comics + novels))*100;
                var C_msg = "漫画の割合：" + comics_ratio.toFixed(1) + "%";
                return C_msg;
            }
            
        case 2:
            var comics = books_data.comics;
            var novels = books_data.novels;
            if(novels == 0){
                return "小説を登録してください";
            }else{
                var novels_ratio = (novels / (comics + novels))*100;
                var N_msg = "小説の割合：" + novels_ratio.toFixed(1) + "%";
                return N_msg;
            }
            
        
        case 3:
            var comics_total = books_data.total_comics;
            var novels_total = books_data.total_novels;
            if(comics_total == 0){
                return "漫画を登録してください";
            }else{
                var comics_total_ratio = (comics_total / (comics_total + novels_total))*100;
                var C_total_msg = "漫画の割合：" + comics_total_ratio.toFixed(1) + "%";
                return C_total_msg;
            }
        
        case 4:
            var comics_total = books_data.total_comics;
            var novels_total = books_data.total_novels;
            if(comics_total == 0){
                return "小説を登録してください";
            }else{
                var novels_total_ratio = (novels_total / (comics_total + novels_total))*100;
                var N_total_msg = "小説の割合：" + novels_total_ratio.toFixed(1) + "%";
                return N_total_msg;
            }
            
    }
    
}

if(document.getElementById("comics-ratio")){
    document.getElementById("comics-ratio").innerHTML = ratio(1);
    document.getElementById("novels-ratio").innerHTML = ratio(2);
    document.getElementById("comics-total-ratio").innerHTML = ratio(3);
    document.getElementById("novels-total-ratio").innerHTML = ratio(4);
}

