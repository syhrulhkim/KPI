const perColorUI = document.getElementById('grade');
const perValidUI = document.getElementById('percentage-weightage');

function masterClac() {

  let peratus = Number(document.getElementById('peratus').value);
  let threshold = Number(document.getElementById('threshold').value); 
  let base = Number( document.getElementById('base').value);
  let stretch = Number(document.getElementById('stretch').value); 
  let pencapaian = Number(document.getElementById('pencapaian').value); 

    let skor_KPI = 0;
    let skor_sebenar = 0;
    let total_score = 0;

    if ( document.getElementById('peratus').value == "" || document.getElementById('threshold').value == "" || document.getElementById('base').value == "" || document.getElementById('stretch').value == "" || document.getElementById('pencapaian').value == "" ) {
      
      document.getElementById("skor_KPI").value = 0;
      document.getElementById("skor_sebenar").value = 0;
      
    } else if (threshold < base && base < stretch) {
      
      // CONDITION ONE
        if (pencapaian < threshold) {

        skor_KPI = document.getElementById("skor_KPI").value = 0;
        skor_sebenar = document.getElementById("skor_sebenar").value = 0;
        total_score = document.getElementById("percentage-total").value = skor_sebenar;

        } else if (pencapaian >= stretch) {

        skor_KPI = document.getElementById("skor_KPI").value = 100;
        skor_sebenar = document.getElementById("skor_sebenar").value = (peratus / 100) * skor_KPI
        total_score = document.getElementById("percentage-total").value = skor_sebenar;

        } else if (pencapaian >= threshold && pencapaian < base) {

        value1 = parseFloat(pencapaian) - parseFloat(threshold); 
        value2 = parseFloat(base) - parseFloat(threshold); 

        KPIScore = ((( value1 / value2 ) * 35) + 30);
        ScoreSebenar = ((peratus / 100) * KPIScore);

        total = document.getElementById("skor_KPI").value = KPIScore.toFixed(2) ;
        skor_sebenar = document.getElementById("skor_sebenar").value = ScoreSebenar.toFixed(2) ;
        total_score = document.getElementById("percentage-total").value = skor_sebenar;

      } else if (pencapaian >= base && pencapaian < stretch) {

        value1 = parseFloat(pencapaian) - parseFloat(base);
        value2 = parseFloat(stretch) - parseFloat(base);

        KPIScore = ((( value1 / value2 ) * 35) + 65);
        ScoreSebenar = ((peratus / 100) * KPIScore);

        skor_KPI = document.getElementById("skor_KPI").value = KPIScore.toFixed(2) ;
        skor_sebenar = document.getElementById("skor_sebenar").value = ScoreSebenar.toFixed(2) ;
        total_score = document.getElementById("percentage-total").value = skor_sebenar;
      }

    } else {

          if ( pencapaian > threshold ) {
          skor_KPI = document.getElementById("skor_KPI").value = 0;
          skor_sebenar = document.getElementById("skor_sebenar").value = 0;
          total_score = document.getElementById("percentage-total").value = skor_sebenar;

        } else if (pencapaian <= stretch) {
          skor_KPI = document.getElementById("skor_KPI").value = 100;
          skor_sebenar = document.getElementById("skor_sebenar").value = (peratus / 100) * skor_KPI
          total_score = document.getElementById("percentage-total").value = skor_sebenar;

        } else if (pencapaian <= threshold && pencapaian > base) {
          value1 = parseFloat(pencapaian) - parseFloat(threshold); 
          value2 = parseFloat(base) - parseFloat(threshold); 
          KPIScore = ((( value1 / value2 ) * 35) + 30);
          ScoreSebenar = ((peratus / 100) * KPIScore);
          total = document.getElementById("skor_KPI").value = KPIScore.toFixed(2) ;
          skor_sebenar = document.getElementById("skor_sebenar").value = ScoreSebenar.toFixed(2) ;
          total_score = document.getElementById("percentage-total").value = skor_sebenar;

        } else if (pencapaian <= base && pencapaian > stretch) {
          value1 = parseFloat(pencapaian) - parseFloat(base);
          value2 = parseFloat(stretch) - parseFloat(base);
          KPIScore = ((( value1 / value2 ) * 35) + 65);
          ScoreSebenar = ((peratus / 100) * KPIScore);
          skor_KPI = document.getElementById("skor_KPI").value = KPIScore.toFixed(2) ;
          skor_sebenar = document.getElementById("skor_sebenar").value = ScoreSebenar.toFixed(2) ;
          total_score = document.getElementById("percentage-total").value = skor_sebenar;
        }
    }
}