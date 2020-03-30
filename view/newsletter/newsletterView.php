<div class="newsletter">
    <p>Besoin de rester connecter sur les nouvelles tendances?<br>
    <span class="subscribe-newsletter">Subcribe on our newsletter !</span>
    </p>
    <!-- newsletter form -->
    <form method="POST" action="" class="form-newsletter"  name="newsletterForm" > 
        <input type="text" name="emailNewsletter" id="emailNewsletter" placeholder="tap your email" class="form-newsletter" onkeyup="validateNews(this.value)">
        <p id="messageNewsletter" class="form-newsletter"> </p>
        <input type="submit" value="S'inscrire" class="form-newsletter" onclick="return(validateNewsletter());">
    </form> 
    <!--  -->
</div>