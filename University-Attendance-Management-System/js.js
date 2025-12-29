
        // خاصية اقدر من خلالها الموقع من المتصفح 
        navigator.geolocation.getCurrentPosition(
        // دالة بتاخد خط الطول والعرض
            function(pos) {
                document.getElementById('lat').value = pos.coords.latitude;// خط الطول
                document.getElementById('lon').value = pos.coords.longitude; // خط العرض
                const btn = document.getElementById('sendBtn'); // بياخد قيمة الوتن من الموقع
                btn.disabled = false; // لو البوتن فولس  ويغير الرسالة الى ارسال الموقع
                btn.textContent = 'إرسال الموقع ';  
            },

            
            function(err) {
            // دالة للايرورز 
                let msg = document.createElement('p'); // فى حالة وجود خطا بيخرج رسالة داخل برجراف 
                msg.style.color = 'red'; // لونها احمر
                msg.textContent = ' لم يتم الإذن أو حدث خطأ: ' + (err.message || ''); // الرسالة الى هتخرج + الايرور بتاع المتصفح
                document.body.insertBefore(msg, document.forms[0]); // هنا هيخلى الرسالة تبقى فوق ف اول الصفحة
            },
            //دالة بتحاول تعلى دقة الموقع 
            { enableHighAccuracy: true }
        );
       