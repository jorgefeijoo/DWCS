<?php
class Post
{
    private int $id;

    private string $title;

    private string $contents;

    function __toString()
    {
        return "<br><br> id: $this->id, title: $this->title, contents: $this -> contents";
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }


    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }


    public function getContents()
    {
        return $this->contents;
    }


    public function setContents($contents)
    {
        $this->contents = $contents;

        return $this;
    }
}
