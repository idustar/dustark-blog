<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 在 TagController 顶部添加如下语句
use App\Tag;

// 在TagController顶部添加这个use语句
use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;


class TagController extends Controller
{
    protected $fields = [
        'tag' => '',
        'title' => '',
        'subtitle' => '',
        'meta_description' => '',
        'page_image' => '',
        'layout' => 'blog.layouts.index',
        'reverse_direction' => 0,
        'is_show' => 0
    ];

    // 替换 create() 方法如下
    /**
     * Show form for creating new tag
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('admin.tag.create', $data);
    }

    // 替换 index 方法如下
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index')->with('tags',$tags);
    }

    // 修改 store() 方法代码如下
    /**
     * Store the newly created tag in the database.
     *
     * @param TagCreateRequest $request
     * @return Response
     */
    public function store(TagCreateRequest $request)
    {
        $tag = new Tag();
        foreach (array_keys($this->fields) as $field) {
            $tag->$field = $request->get($field);
        }
        $tag->save();

        return redirect('/admin/tag')
            ->withSuccess("The tag '$tag->tag' was created.");
    }

    /**
     * Show the form for editing a tag
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $tag->$field);
        }

        return view('admin.tag.edit', $data);
    }

    /**
     * Update the tag in storage
     *
     * @param TagUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(TagUpdateRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);

        foreach (array_keys(array_except($this->fields, ['tag'])) as $field) {
            $tag->$field = $request->get($field);
        }
        $tag->save();

        return redirect("/admin/tag/$id/edit")
            ->withSuccess("Changes saved.");
    }

    /**
     * Delete the tag
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect('/admin/tag')
            ->with("success","The '$tag->tag' tag has been deleted.");
    }
}
