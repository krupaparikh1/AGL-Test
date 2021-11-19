<?php

class People
{
    /**
     * Get People Data
     *
     * @return mixed|void
     * @throws \Exception
     */
    public function getPeopleData()
    {
        $url = "http://agl-developer-test.azurewebsites.net/people.json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // Closing
        curl_close($ch);
        if ($httpcode == 200) {
            return json_decode($result, true);
        } else {
            throw new Exception('Url doesnot have valid Json Data');
            return;
        }
    }
}
