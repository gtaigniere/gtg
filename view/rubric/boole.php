    <section id="section_boole">

        <h1>Algèbre de Boole</h1>
        <p>Négation =&gt; -P, !P, &macr;P, <span class="text_overline">P</span></p>
        <p>ET =&gt; p et q, p and q, p &and; q, p & q, p * q, p &times; q, p.q, pq, p &cap; q</p>
        <p>OU =&gt; p ou q, p or q, p &nu; q, p + q, p &cup; q</p>

        <table class="table_verite">

            <caption>Table de vérité (P et <span class="text_overline">Q</span> ou R)</caption>

            <thead>
                <tr>
                    <th class="table_col1car">P</th>
                    <th class="table_col1car">Q</th>
                    <th class="table_col1car">R</th>
                    <th class="table_col1car"><span class="text_overline">Q</span></th>
                    <th class="table_col5car">P et <span class="text_overline">Q</span></th>
                    <th class="table_col10car">P et <span class="text_overline">Q</span> ou R</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>0</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                </tr>
            </tbody>

        </table>

        <table class="table_verite">

            <caption>Table de vérité (-(<span class="text_overline">P</span> ou Q) et R)</caption>

            <thead>
                <tr>
                    <th class="table_col1car">P</th>
                    <th class="table_col1car">Q</th>
                    <th class="table_col1car">R</th>
                    <th class="table_col1car"><span class="text_overline">P</span></th>
                    <th class="table_col5car"><span class="text_overline">P</span> ou Q</th>
                    <th class="table_col5car">!(<span class="text_overline">P</span> ou Q)</th>
                    <th class="table_col10car">-(<span class="text_overline">P</span> ou Q) et R</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>0</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </tbody>

        </table>

    </section>