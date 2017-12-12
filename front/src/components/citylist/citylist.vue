<template>
    <div id="container">
        <div class="main">
            <h2 class="one">热门城市</h2>
            <h2 class="two">按拼音字母查询</h2>
        </div>
    </div>
</template>
<script type="text/javascript">
    import './citylist.scss'
    import axios from 'axios';
    import qs from 'qs';
    import $ from 'jquery';

    export default{
        data:function(){
            return {
                data:[],
            }
        },
        mounted(){
            axios({
                url:'http://localhost:3333/api/city.php',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(res => {
                this.data = res.data.regions;

                //用来装热门城市
                let hotcity=[];
                let idxcity={};
                let arr1='ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
                arr1.forEach(item=>{
                    idxcity[item]=[];
                });

                $.each(this.data, function(index, item) {
                    // 如果item为直辖市或特别行政区
                    if(item.municipality || item.special){
                        if(item.hot){
                            hotcity.push({id:item.id,name:item.name});
                        }
                        idxcity[item.pinyin[0]].push({id:item.id,name:item.name});
                        return;
                    }
                    item.regions.forEach((city,idx)=>{
                        if(city.hot){
                            hotcity.push({id:city.id,name:city.name});
                        }
                        idxcity[city.pinyin[0]].push({id:city.id,name:city.name});
                    });
                });
                
                var $hc=$('<div/>').addClass('hot');
                var cont=hotcity.map(item=>{
                    return `<a href="#" class="allhot">${item.name}</a>`
                }).join('');
                $hc.html(cont)
                $hc.insertAfter($('.one'));  

                for(var attr in idxcity){
                    if(attr.length===0){
                         continue;
                    }
                    // 字母索引
                    let $allcy=$('<div/>').addClass('cylist');
                    
                    let $cylink=$('<a/>').addClass('cyidx').text(attr);
                    
                    //对应索引的城市
                    var cont1=idxcity[attr].map(item=>{
                         return `<a href="#" data-id="${item.id}" class="allA">${item. name}</a>`
                    }).join('');
                    console.log($allcy);
                    $allcy.html(cont1);
                    $allcy.append($cylink);
 
                    $allcy.appendTo($('.main'));
                }

            })
        }
    }
</script>