var CDown = function() {
    this.state=0;
    this.counts=[];
    this.interval=null;
}

CDown.prototype = {
    init: function(){
        this.state=1;
        var self=this;
        this.interval=window.setInterval(function(){self.tick();}, 1000);
    },
    add: function(date,id){
        this.counts.push({d:date,id:id});
        this.tick();
        if(this.state==0) this.init();
    },
    expire: function(idxs){
        for(var x in idxs) {
            this.display(this.counts[idxs[x]], "Now!");
            this.counts.splice(idxs[x], 1);
        }
    },
    format: function(r){

var out =

"<div class=cdTimer><div style='display: block; clear: both; text-align: center; widht: 100%; margin-top: 5px;'>Faltam</div>";


out += "<div class='timer1'><div class='cdTimerDigit'>"+ r.d +"</div>";
out += "<div class='cdTimerTitle'>"+((r.d==1)?"Dia":"Dias")+"</div></div><div class='pontos'>:</div>";

out += "<div class='timer1'><div class='cdTimerDigit'>"+ r.h +"</div>";
out += "<div class='cdTimerTitle'>"+((r.d==1)?"Hora":"Horas")+"</div></div><div class='pontos'>:</div>";

out += "<div class='timer1'><div class='cdTimerDigit'>"+ r.m +"</div>";
out += "<div class='cdTimerTitle'>Minutos</div></div><div class='clearbox'></div>";

return out.substr(0,out.length-2);
},
    math: function(work){
        var y=w=d=h=m=s=ms=0;

        ms=(""+((work%1000)+1000)).substr(1,3);
        work=Math.floor(work/1000);//kill the "milliseconds" so just secs

        y=Math.floor(work/31536000);//years (no leapyear support)
        w=Math.floor(work/604800);//weeks
        d=Math.floor(work/86400);//days
        work=work%86400;

        h=Math.floor(work/3600);//hours
        work=work%3600;

        m=Math.floor(work/60);//minutes
        work=work%60;

        s=Math.floor(work);//seconds

        return {y:y,w:w,d:d,h:h,m:m,s:s,ms:ms};
    },
    tick: function(){
        var now=(new Date()).getTime(),
            expired=[],cnt=0,amount=0;

        if(this.counts)
        for(var idx=0,n=this.counts.length; idx<n; ++idx){
            cnt=this.counts[idx];
            amount=cnt.d.getTime()-now;//calc milliseconds between dates

            // if time is already past
            if(amount<0){
                expired.push(idx);
            }
            // date is still good
            else{
                this.display(cnt, this.format(this.math(amount)));
            }
        }

        // deal with any expired
        if(expired.length>0) this.expire(expired);

        // if no active counts, stop updating
        if(this.counts.length==0) window.clearTimeout(this.interval);
        
    },
    display: function(cnt,msg){
        document.getElementById(cnt.id).innerHTML=msg;
    }
};

window.onload=function(){
    var cdown = new CDown();

    cdown.add(new Date(2021,10,25,1,50,7), "countbox1");
};