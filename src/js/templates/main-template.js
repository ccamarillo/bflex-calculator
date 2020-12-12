const MainTemplate = `
    <div>
        <form method="post" action="receipt.php">
            <sections 
                v-for="section in sections" 
                :id="section.id" 
                :title="section.title" 
                :questions="section.questions"
                :details="section.details"
            ></sections>
            <div class="section background white get-results">
                <div class="container-md">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <h3>See the Bflex™ Advantage</h3>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <button v-if="submit_enabled" type="submit">Get results</button>
                            <button v-if="!submit_enabled" type="submit" disabled class="disabled">Fix form errors in <em>red</em> to calculate.</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="http://verathon.com" target="new">
                                <img src="./img/verathon-logo.png" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background lightest-grey footer">
                <div class="container-md">
                    <p>
                        <span><a href="https://www.verathon.com/contact-us/" target="new">CONTACT US</a></span>
                        <span><a href="tel:800-331-2313">800-331-2313</a> (US & Canada Only)</span>
                        <span>Dir: <a href="tel:+1-425-867-1348">+1-425-867-1348</a></span>
                    </p>
                    <p>
                        <span>Fax: +1-425-883-2896</span>
                        <span><a href="http://verathon.com" target="new">Verathon Inc.</a></span>
                        <span>20001 North Creek Parkway Bothell, WA 98011</span>
                    </p>
                </div>
            </div>
        </form>
    </div>
`

export { MainTemplate }
