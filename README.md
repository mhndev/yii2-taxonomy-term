Taxonomy Term
=============
taxonomy term implementation in Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist mhndev/yii2-taxonomy-term "1.*"
```

or add

```
"mhndev/yii2-taxonomy-term": "1.*"
```

to the require section of your `composer.json` file.


## Execute Migrations

```
php yii migrate --migrationPath=@vendor/mhndev/yii2-taxonomy-term/src/migrations
```

Usage
-----
user mhndev\yii2TaxonomyTerm\traits\TermableTrait in each Model which you want to use taxonomy-term for

### example

##### Post Model
```
class Post extends ActiveRecord
{

    use TermableTrait;

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'posts';

    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'required'],
        ];
    }

}

```


### attach a term to an entity
```
    $term = Term::findOne(['id'=>1]);
    $post = Post::findOne(['id'=>1]);
    $post->attachTerm($term);

```
### detach a term from an entity
```
    $term = Term::findOne(['id'=>1]);
    $post = Post::findOne(['id'=>1]);
    $post->detachTerm($term);

```
### list terms of an entity
```
    $post = Post::findOne(['id'=>1]);
    $post->listTerms();

```
### get term tree
```
    $term = Term::findOne(['id'=>1]);
    $term->getTree();
```
