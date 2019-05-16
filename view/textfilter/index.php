<?php

$text = $app->request->getPost("input");

if ($text) {
    $filter = new \Algn\TextFilter\TextFilter();

    $filters = ["bbcode2html", "link", "markdown", "nl2br"];

    foreach ($filters as $index => $filterType) {
        $res = $filter->parse($text, $filterType);

        if ($res) {
            $text = $res;
        }
    }
}

?>

<style>
    * {
        font-family: sans-serif;
    }

    label {
        display: block;
    }

    div.input {
        margin-bottom: 20px;
    }
</style>



<h1>Input Text</h1>
<form class="input" method="post" action="textfilter">
    <textarea id="input" name="input" id="input" cols="30" rows="10"></textarea>
    <input type="submit" name="submit" value="submit">
</form>


<h1>Rendered Text</h1>
<p id="rendered"><?= $text ?></p>


<script>
    // const input = document.getElementById("input");
    // const rendered = document.getElementById("rendered");

    // input.addEventListener("input", async () => {
    //     let result = await fetch("../textfilterapi/", {
    //         method: "POST",
    //         headers: {
    //             "Content-Type": "application/json"
    //         },
    //         body: JSON.stringify({
    //             text: input.value,
    //             filters: ["bbcode2html", "link", "markdown", "nl2br"]
    //         })
    //     })

    //     let text = await result.text();

    //     console.log(text)

    //     rendered.innerHTML = text;
    // })
</script>