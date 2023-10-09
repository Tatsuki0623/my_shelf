import Quagga from 'quagga';

const run = document.getElementById('run');

run.addEventListener('click', () => {
  
  const stop = document.createElement('button');
  stop.textContent = 'スキャンの中止';
  const target = document.getElementById('stop');
  target.appendChild(stop);
  
  Quagga.init(
    {
      inputStream: {
        type: 'LiveStream',
        constraints: {
          width: 640,
          height:380,
        },
      },
      decoder: {
        readers: [
          {
            format: 'ean_reader',
            config: {},
          },
        ],
      },
    },
    (err) => {
      if (!err) {
        Quagga.start();
      } else {
        Quagga.stop();
        alert(
          'この機能を利用するには\nブラウザのカメラ利用を許可してください。'
        );
      }
    }
  );
  
  Quagga.onDetected((result) => {
    const code = result.codeResult.code;
    if (code.includes('9784')) {
      document.getElementById('code').value = code;
      Quagga.stop();
    }
  });
  
  stop.addEventListener('click', () => {
    stop.remove();
    Quagga.stop();
  });
});
